// Estado del formulario para validación
const emailEstado = {
    email: '',
    asunto: '',
    mensaje: ''
};

// Selectores
const formulario = document.querySelector('#formulario');
const inputEmail = document.querySelector('#email');
const inputAsunto = document.querySelector('#asunto');
const inputMensaje = document.querySelector('#mensaje');
const btnEnviar = formulario.querySelector('button[type="submit"]');
const btnReset = formulario.querySelector('button[type="reset"]');
const spinner = document.querySelector('#spinner');

document.addEventListener('DOMContentLoaded', () => {
    inputEmail.addEventListener('input', validar);
    inputAsunto.addEventListener('input', validar);
    inputMensaje.addEventListener('input', validar);

    formulario.addEventListener('submit', enviarEmail);

    btnReset.addEventListener('click', e => {
        e.preventDefault();
        resetFormulario();
    });
});

function validar(e) {
    const campo = e.target;

    // Validación campo vacío (trim elimina espacios)
    if (campo.value.trim() === '') {
        mostrarAlerta(
            `El campo ${campo.id.toUpperCase()} es obligatorio`,
            campo.parentElement
        );
        emailEstado[campo.name] = '';
        comprobarFormulario();
        return;
    }

    // Validación email con RegEx
    if (campo.id === 'email' && !validarEmail(campo.value)) {
        mostrarAlerta(
            'El EMAIL no es válido',
            campo.parentElement
        );
        emailEstado[campo.name] = '';
        comprobarFormulario();
        return;
    }

    // Si pasa validaciones
    limpiarAlerta(campo.parentElement);
    emailEstado[campo.name] = campo.value.trim().toLowerCase();
    comprobarFormulario();
}

/**
 * Expresión regular para validar email
 */
function validarEmail(email) {
    const regex = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    return regex.test(email);
}

function enviarEmail(e) {
    e.preventDefault(); // Evita el envío real del formulario

    // Mostrar spinner
    spinner.classList.remove('hidden');
    spinner.classList.add('flex');

    // Simulación de envío
    setTimeout(() => {
        // Ocultar spinner
        spinner.classList.remove('flex');
        spinner.classList.add('hidden');

        // Mensaje de éxito
        const alertaExito = document.createElement('p');
        alertaExito.classList.add(
            'bg-green-500',
            'text-white',
            'p-2',
            'text-center',
            'mt-5'
        );
        alertaExito.textContent = 'El mensaje se ha enviado correctamente';

        formulario.appendChild(alertaExito);

        // Reset final tras mostrar éxito
        setTimeout(() => {
            alertaExito.remove();
            resetFormulario();
        }, 3000);

    }, 3000);
}

function mostrarAlerta(mensaje, referencia) {
    // Evitar alertas duplicadas
    const alertaExistente = referencia.querySelector('.alerta');
    if (alertaExistente) return;

    const alerta = document.createElement('p');
    alerta.textContent = mensaje;
    alerta.classList.add(
        'alerta',
        'bg-red-600',
        'text-white',
        'p-2',
        'text-center'
    );

    referencia.appendChild(alerta);
}

function limpiarAlerta(referencia) {
    const alerta = referencia.querySelector('.alerta');
    if (alerta) {
        alerta.remove();
    }
}

function comprobarFormulario() {
    // Si algún campo está vacío → deshabilitar botón
    if (Object.values(emailEstado).includes('')) {
        btnEnviar.disabled = true;
        btnEnviar.classList.add('opacity-50');
        return;
    }

    // Si todo está correcto → habilitar botón
    btnEnviar.disabled = false;
    btnEnviar.classList.remove('opacity-50');
}

function resetFormulario() {
    formulario.reset();

    emailEstado.email = '';
    emailEstado.asunto = '';
    emailEstado.mensaje = '';

    btnEnviar.disabled = true;
    btnEnviar.classList.add('opacity-50');

    // Limpiar alertas
    document.querySelectorAll('.alerta').forEach(alerta => alerta.remove());
}
