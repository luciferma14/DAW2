const lista = document.createElement("ul");

const tareas = ["Estudiar", "Hacer ejercicio", "Leer"];

tareas.forEach(tarea => {
    const item = document.createElement("li");
    item.innerText = tarea;
    lista.appendChild(item);
});

const contenedor = document.getElementById("contenedor");
contenedor.appendChild(lista);