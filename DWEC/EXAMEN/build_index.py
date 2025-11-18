from __future__ import annotations

import html
import re
from pathlib import Path
from typing import Iterable, List

ROOT = Path(__file__).parent


def to_posix(path: Path) -> str:
    return path.as_posix()


def escape(text: str) -> str:
    return html.escape(text, quote=True)


def anchor(path: Path, label: str | None = None, css: str = "") -> str:
    label = label or path.name
    classes = f' class="{css.strip()}"' if css.strip() else ""
    return f'<a{classes} href="{to_posix(path)}" target="_blank" rel="noopener noreferrer">{escape(label)}</a>'


def gather_tools() -> list[dict]:
    tools = []
    tool_dir = ROOT / "cheatsheet" / "getSet"
    if tool_dir.exists():
        files = sorted([p for p in tool_dir.iterdir() if p.is_file()], key=lambda p: p.name.lower())
        tools.append(
            {
                "title": "Getters & Setters",
                "description": "Referencias y estilos para la herramienta de getters y setters.",
                "files": files,
            }
        )
    return tools


def gather_documents() -> list[dict]:
    sections: list[dict] = []
    cheatsheet_dir = ROOT / "cheatsheet" / "cheatsheet"
    general_files: List[Path] = []
    if cheatsheet_dir.exists():
        for file in sorted(cheatsheet_dir.iterdir(), key=lambda p: p.name.lower()):
            if not file.is_file():
                continue
            if file.stem.lower().startswith("index"):
                general_files.append(file)
            elif "poo" not in file.stem.lower():
                general_files.append(file)
    if general_files:
        sections.append(
            {
                "title": "Cheatsheet general",
                "description": "Recursos HTML y JS del cheatsheet principal.",
                "files": general_files,
            }
        )

    docs_dir = ROOT / "docs"
    pdfs = sorted([p for p in docs_dir.glob("*.pdf") if p.is_file()], key=lambda p: p.name.lower())
    for pdf in pdfs:
        sections.append(
            {
                "title": pdf.stem.replace("_", " "),
                "description": "Documento PDF.",
                "files": [pdf],
            }
        )

    # asegurar al menos 3 divisiones
    while len(sections) < 3:
        sections.append(
            {
                "title": f"Espacio reservado {len(sections) + 1}",
                "description": "Añade nuevos documentos aquí cuando los tengas listos.",
                "files": [],
            }
        )

    return sections[:3]


def gather_exercises() -> list[dict]:
    ejercicios_dir = ROOT / "ejercicios"
    entries: dict[str, dict] = {}
    pattern = re.compile(r"(Actividad_\d+)", re.IGNORECASE)
    for file in sorted(ejercicios_dir.iterdir(), key=lambda p: p.name.lower()):
        if not file.is_file():
            continue
        stem = file.stem
        match = pattern.match(stem)
        key = match.group(1) if match else stem
        bucket = entries.setdefault(
            key,
            {
                "title": key.replace("_", " "),
                "pdfs": [],
                "html": [],
                "others": [],
            },
        )
        suffix = file.suffix.lower()
        if suffix == ".pdf":
            bucket["pdfs"].append(file)
        elif suffix in {".html", ".htm"}:
            bucket["html"].append(file)
        else:
            bucket["others"].append(file)
    return list(entries.values())


def gather_solutions_tree(path: Path) -> list[dict]:
    nodes = []
    for child in sorted(path.iterdir(), key=lambda p: (0 if p.is_dir() else 1, p.name.lower())):
        if child.is_dir():
            nodes.append({"type": "dir", "name": child.name, "children": gather_solutions_tree(child)})
        else:
            nodes.append({"type": "file", "path": child})
    return nodes


def render_file_list(files: Iterable[Path]) -> str:
    files = list(files)
    if not files:
        return '<p class="text-muted small mb-0">Sin documentos disponibles todavía.</p>'
    items = "".join(
        f'<li class="list-group-item">{anchor(file, file.name)}</li>'
        for file in files
    )
    return f'<ul class="list-group list-group-flush">{items}</ul>'


def render_tools_section(tools: list[dict]) -> str:
    if not tools:
        return '<p class="mb-0 text-muted">Añade tus herramientas dentro de <code>cheatsheet/getSet</code>.</p>'
    cards = []
    for tool in tools:
        cards.append(
            f'''
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">{escape(tool["title"])}</h5>
                    <p class="card-text text-muted small">{escape(tool["description"])}</p>
                    {render_file_list(tool["files"])}
                </div>
            </div>
            '''
        )
    return "\n".join(cards)


def render_document_sections(sections: list[dict]) -> str:
    blocks = []
    for section in sections:
        blocks.append(
            f'''
            <div class="col-12 col-md-4 mb-3">
                <div class="border rounded h-100 p-3 bg-white shadow-sm">
                    <h6 class="fw-semibold">{escape(section["title"])}</h6>
                    <p class="text-muted small">{escape(section["description"])}</p>
                    {render_file_list(section["files"])}
                </div>
            </div>
            '''
        )
    return '<div class="row">' + "\n".join(blocks) + "</div>"


def render_exercises(exercises: list[dict]) -> str:
    if not exercises:
        return '<p class="text-muted mb-0">Todavía no hay ejercicios cargados.</p>'

    def sort_key(entry: dict) -> tuple:
        match = re.search(r"\d+", entry["title"])
        number = int(match.group()) if match else 0
        return (number, entry["title"])

    cards = []
    for entry in sorted(exercises, key=sort_key):
        pdf_links = "".join(
            f'<li class="list-group-item d-flex justify-content-between align-items-center">'
            f'<span>Enunciado</span>{anchor(pdf, "PDF", "btn btn-sm btn-outline-primary")}'
            f"</li>"
            for pdf in entry["pdfs"]
        ) or '<li class="list-group-item text-muted">Sin enunciado PDF</li>'
        html_links = "".join(
            f'<li class="list-group-item d-flex justify-content-between align-items-center">'
            f'<span>Solución</span>{anchor(html_file, "HTML", "btn btn-sm btn-outline-success")}'
            f"</li>"
            for html_file in entry["html"]
        ) or '<li class="list-group-item text-muted">Sin solución HTML</li>'
        cards.append(
            f'''
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">{escape(entry["title"])}</h5>
                    <ul class="list-group list-group-flush">
                        {pdf_links}
                        {html_links}
                    </ul>
                </div>
            </div>
            '''
        )
    return "\n".join(cards)


def render_solution_tree(nodes: list[dict]) -> str:
    if not nodes:
        return '<p class="text-muted">Añade soluciones dentro de <code>soluciones/</code>.</p>'

    parts = ['<ul class="list-group list-group-flush">']
    for node in nodes:
        if node["type"] == "dir":
            parts.append(
                f'''
                <li class="list-group-item">
                    <div class="fw-semibold text-primary">{escape(node["name"])}</div>
                    <div class="ms-3">
                        {render_solution_tree(node["children"])}
                    </div>
                </li>
                '''
            )
        else:
            parts.append(f'<li class="list-group-item">{anchor(node["path"])}</li>')
    parts.append("</ul>")
    return "\n".join(parts)


def build_html() -> str:
    tools = gather_tools()
    documents = gather_documents()
    exercises = gather_exercises()
    solutions_path = ROOT / "soluciones"
    solutions_nodes = gather_solutions_tree(solutions_path) if solutions_path.exists() else []

    return f"""<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Índice de recursos EXAMEN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {{
            background: #f5f6fa;
        }}
        code {{
            background-color: #f0f2f5;
            padding: 0.15rem 0.35rem;
            border-radius: 0.25rem;
        }}
    </style>
</head>
<body>
    <main class="container py-5">
        <header class="text-center mb-5">
            <p class="text-uppercase text-muted small mb-1">EXAMEN</p>
            <h1 class="fw-bold">Índice general del proyecto</h1>
            <p class="text-muted">Accede rápidamente a herramientas, documentos, ejercicios y soluciones.</p>
        </header>
        <div class="accordion" id="resourceAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTools">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTools" aria-expanded="true" aria-controls="collapseTools">
                        Herramientas
                    </button>
                </h2>
                <div id="collapseTools" class="accordion-collapse collapse show" aria-labelledby="headingTools" data-bs-parent="#resourceAccordion">
                    <div class="accordion-body">
                        {render_tools_section(tools)}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDocs">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDocs" aria-expanded="false" aria-controls="collapseDocs">
                        Documentos
                    </button>
                </h2>
                <div id="collapseDocs" class="accordion-collapse collapse" aria-labelledby="headingDocs" data-bs-parent="#resourceAccordion">
                    <div class="accordion-body">
                        {render_document_sections(documents)}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingExercises">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExercises" aria-expanded="false" aria-controls="collapseExercises">
                        Ejercicios
                    </button>
                </h2>
                <div id="collapseExercises" class="accordion-collapse collapse" aria-labelledby="headingExercises" data-bs-parent="#resourceAccordion">
                    <div class="accordion-body">
                        {render_exercises(exercises)}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSolutions">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSolutions" aria-expanded="false" aria-controls="collapseSolutions">
                        Soluciones
                    </button>
                </h2>
                <div id="collapseSolutions" class="accordion-collapse collapse" aria-labelledby="headingSolutions" data-bs-parent="#resourceAccordion">
                    <div class="accordion-body">
                        {render_solution_tree(solutions_nodes)}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
"""


def main() -> None:
    output = build_html()
    (ROOT / "index.html").write_text(output, encoding="utf-8")


if __name__ == "__main__":
    main()

