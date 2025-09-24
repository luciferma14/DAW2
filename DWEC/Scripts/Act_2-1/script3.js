

function dobles(event) {
  event.preventDefault();

  const num = parseFloat(document.getElementById('numEj3').value);
  let veces = parseInt(document.getElementById('vecesEj3').value) || 3;

  let actual = num;
  let resultados = [];
  for (let i = 0; i < veces; i++) {
    actual *= 2;
    resultados.push(actual);
  }
  document.getElementById('salidaEj3').innerHTML =`El número es ` + num + ` y se hallará el doble `
  + veces + ` veces<br>${resultados.join(", ")}`;
}