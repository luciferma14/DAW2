const caja = document.getElementById('caja');
const boton = document.getElementById('cambiar-estilo');

boton.addEventListener('click', function() {
    if (caja.classList.contains('caja-normal')) {
        caja.classList.remove('caja-normal');
        caja.classList.add('caja-especial');
        boton.innerText = 'Cambiar a Normal';
    } else {
        caja.classList.remove('caja-especial');
        caja.classList.add('caja-normal');
        boton.innerText = 'Cambiar a Especial';
    }
});
