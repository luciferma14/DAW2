const formulario = document.querySelector('#formulario');
const resultado = document.querySelector('#resultado');
const paginacionDiv = document.querySelector('#paginacion');

const registroPorPagina = 40;
let totalPaginas;
let iterator;
let paginaActual = 1;

formulario.addEventListener('submit', validarFormulario);

function validarFormulario(e){
    e.preventDefault();

    const termino = document.querySelector('#termino').value.trim();

    if (termino === ''){
        alert("Debes introducir un termino de búsqueda");
        return;
    }

    paginaActual = 1;

    buscarImagenes();
}

async function buscarImagenes(){
    const termino = document.querySelector('#termino').value;

    const key = '54484890-f0ade6c395d4e3d4e27706e5c';
    const url = `https://pixabay.com/api/?key=${key}&q=${termino}&per_page=${registroPorPagina}&page=${paginaActual}`;

    try{
        const respuesta = await fetch(url);
        const datos = await respuesta.json();

        totalPaginas = calcularPaginas(datos.totalHits);
        mostrarImagenes(datos.hits);

    }catch(error){
        console.error(error);
    }
}

function mostrarImagenes(imagenes){
    limpiarHTML(resultado);

    imagenes.forEach(imagen => {
        const { previewURL, likes, views, largeImageURL } = imagen;

        resultado.innerHTML += `
        <div class="w-1/2 md:w-1/3 lg:w-1/4 mb-4 p-3">
                <div class="bg-white">
                    <img src="${previewURL}" class="w-full">
                    <div class="p-4">
                        <p class="font-bold">${likes} <span class="font-light">Likes</span></p>
                        <p class="font-bold">${views} <span class="font-light">Vistas</span></p>
                        <a 
                            href="${largeImageURL}" 
                            target="_blank"
                            class="block w-full bg-blue-800 hover:bg-blue-500 text-white uppercase font-bold text-center rounded mt-5 p-1">
                            Ver Imagen
                        </a>
                    </div>
                </div>
            </div>
        `;
    });

    imprimirPaginador();
}

function calcularPaginas(total){
    return parseInt(Math.ceil(total / registroPorPagina));
}

function *crearPaginador(total){
    for(let i = 1; i <= total; i++){
        yield i;
    }
}

function imprimirPaginador() {
    limpiarHTML(paginacionDiv);

    iterator = crearPaginador(totalPaginas);

    while(true){
        const {value, done} = iterator.next();

        if (done){
            return;
        }

        const boton = document.createElement('a');
        boton.href = '#';
        boton.textContent = value;
        boton.className = 'siguiente bg-yellow-400 px-4 py-1 mr-2 font-bold mb-4 rounded';

        boton.onclick = () => {
            paginaActual = value;
            buscarImagenes();
        };

        paginacionDiv.appendChild(boton);
    }
}

function limpiarHTML(contenedor){
    while(contenedor.firstChild){
        contenedor.removeChild(contenedor.firstChild);
    }
}