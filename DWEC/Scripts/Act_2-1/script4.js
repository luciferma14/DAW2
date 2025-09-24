

let secreto = Math.floor(Math.random()*11);
let intentos = 0;

function probar() {
  const entrada = document.getElementById('entradaEj4').value;
  const salida = document.getElementById('salidaEj4');
  if (entrada === "") {
    salida.textContent = "Introduce un número.";
    return;
  }
  const n = parseInt(entrada);
  if (n < 0 || n > 10) {
    salida.textContent = "Número fuera de rango (0-10).";
    return;
  }
  intentos++;
  if (n === secreto) {
    salida.textContent = `¡Has acertado en ${intentos} intentos!`;
  } else if (n < secreto) {
    salida.textContent = `El número es MAYOR. Intentos: ${intentos}`;
  } else {
    salida.textContent = `El número es MENOR. Intentos: ${intentos}`;
  }
}

function reiniciar() {
  secreto = Math.floor(Math.random()*11);
  intentos = 0;
  document.getElementById('entradaEj4').value = "";
  document.getElementById('salidaEj4').textContent = "Juego reiniciado.";
}