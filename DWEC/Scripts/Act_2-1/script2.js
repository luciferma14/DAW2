

function dibujar(event){
    event.preventDefault();

    let filas = document.getElementById("filas").value;
    let columnas = document.getElementById("columnas").value;
    let nombre = document.getElementById("nombreFilas").value;

    let tablaHTML = "<table border='1'>";

    for (let i = 0; i < filas; i++) {
        tablaHTML += "<tr>";
        
        for (let j = 0; j < columnas; j++) {
            tablaHTML += "<td>" + nombre + "</td>";
        }
        tablaHTML += "</tr>";
    }

    tablaHTML += "</table>";

    document.getElementById("tabla").innerHTML = tablaHTML;
}
