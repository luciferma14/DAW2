const formulario = document.querySelector('#formulario');
const selectMoneda = document.querySelector('#moneda');
const selectCripto = document.querySelector('#criptomonedas');
const resultado = document.querySelector('#resultado');

document.addEventListener('DOMContentLoaded', cargarCriptomonedas);
formulario.addEventListener('submit', validarFormulario);

async function cargarCriptomonedas() {
    try {
        const url = 'https://min-api.cryptocompare.com/data/top/totalvolfull?limit=10&tsym=USD';
        const respuesta = await fetch(url);

        if (!respuesta.ok) {
            throw new Error('Error al obtener criptomonedas');
        }

        const datos = await respuesta.json();

        datos.Data.forEach(cripto => {
            const { Name, FullName } = cripto.CoinInfo;

            const option = document.createElement('option');
            option.value = Name;
            option.textContent = FullName;

            selectCripto.appendChild(option);
        });

    } catch (error) {
        console.error(error);
        mostrarError('No se pudieron cargar las criptomonedas');
    }
}

function validarFormulario(e){
    e.preventDefault();

    const moneda = selectMoneda.value;
    const cripto = selectCripto.value;

    if(moneda === '' || cripto === ''){
        mostrarError("Ambos campos son obligatorios");
        return;
    }

    consultarApi(moneda, cripto);
}

function mostrarError(mensaje){
    const errorExistente = document.querySelector('.error');

    if(!errorExistente){
        const divError = document.createElement('div');
        divError.classList.add('error');
        divError.textContent = mensaje;

        resultado.appendChild(divError);

        setTimeout(() => {
            divError.remove();
        }, 2000);
    }
}

async function consultarApi(moneda, cripto){
    try{
        const url = `https://min-api.cryptocompare.com/data/pricemultifull?fsyms=${cripto}&tsyms=${moneda}`;
        const respuesta = await fetch(url);

        if(!respuesta.ok){
            throw new Error("Error en la consulta");
        }

        const datos = await respuesta.json();
        mostrarResultado(datos.RAW[cripto][moneda]);

    }catch(error){
        console.error(error);
        mostrarError("No se han podido obtener los datos");
    }
}

function limpiarResultado(){
    while (resultado.firstChild){
        resultado.removeChild(resultado.firstChild);
    }
}

function mostrarResultado(datos) {
    limpiarResultado();

    const {
        PRICE,
        HIGHDAY,
        LOWDAY,
        CHANGEPCT24HOUR,
        LASTUPDATE
    } = datos;

    const div = document.createElement('div');

    div.innerHTML = `
        <p><strong>Precio:</strong> ${PRICE}</p>
        <p><strong>Máximo del día:</strong> ${HIGHDAY}</p>
        <p><strong>Mínimo del día:</strong> ${LOWDAY}</p>
        <p><strong>Cambio 24h:</strong> ${CHANGEPCT24HOUR.toFixed(2)}%</p>
        <p><strong>Última actualización:</strong> ${new Date(LASTUPDATE * 1000).toLocaleString()}</p>
    `;

    resultado.appendChild(div);
}