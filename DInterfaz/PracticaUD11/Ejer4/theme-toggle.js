let $toggle = document.createElement("button");
$toggle.type = "button";
$toggle.classList.add("theme-toggle");
$toggle.innerText = "Theme Toggle";

$toggle.setAttribute("aria-label", "Cambiar entre tema claro y oscuro");
$toggle.setAttribute("aria-pressed", "false");

document.body.appendChild($toggle);
