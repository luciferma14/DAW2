const buscador = document.getElementById('buscador');
const listaFrutas = document.getElementById('lista-frutas');
const noResultados = document.getElementById('no-resultados');
const contador = document.getElementById('contador');
const frutas = document.querySelectorAll('#lista-frutas li');

function filtrarFrutas() {
    const textoBusqueda = buscador.value.toLowerCase().trim();
    
    let frutasVisibles = 0;
    
    frutas.forEach(fruta => {
        const nombreFruta = fruta.getAttribute('data-fruta');
        
        if (nombreFruta.includes(textoBusqueda)) {
            fruta.classList.remove('oculto');
            frutasVisibles++;
        } else {
            fruta.classList.add('oculto');
        }
    });
    
    if (frutasVisibles === 0 && textoBusqueda !== '') {
        noResultados.style.display = 'block';
        contador.innerText = 'No hay resultados';
    } else {
        noResultados.style.display = 'none';
        contador.innerText = `Mostrando ${frutasVisibles} frutas`;
    }
}

buscador.addEventListener('input', filtrarFrutas);

buscador.addEventListener('keyup', filtrarFrutas);
