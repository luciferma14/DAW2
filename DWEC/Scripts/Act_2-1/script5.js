

function esPrimo(n) {
    if (n <= 1) return false;
    for (let i = 2; i <= Math.sqrt(n); i++) {
      if (n % i === 0) return false;
    }
    return true;
  }
  
function comprobarPrimo() {
    const n = parseInt(document.getElementById('numPrimo').value);
    const salida = document.getElementById('salidaPrimo');

    if (isNaN(n)) {
        salida.textContent = "Introduce un número válido.";
        return;
    }
    salida.textContent = esPrimo(n) ? `${n} es primo` : `${n} NO es primo`;
}

function listarPrimos() {
    const n = parseInt(document.getElementById('numListaPrimos').value);
    const salida = document.getElementById('salidaListaPrimos');
  
    if (isNaN(n) || n < 1) {
      salida.textContent = "Introduce un número mayor que 0.";
      return;
    }
  
    let primos = [];
    for (let i = 2; i <= n; i++) if (esPrimo(i)) primos.push(i);
  
    salida.innerHTML = `Primos hasta ${n}:<br>${primos.join(", ")}`;
}