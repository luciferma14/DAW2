const cuadrado = document.getElementById('cuadrado');
const posicionDisplay = document.getElementById('posicion');

let x = 225;
let y = 175;
const paso = 20;

const maxX = 450;
const maxY = 350;
const minX = 0;
const minY = 0;

function actualizarPosicion() {
    cuadrado.style.left = x + 'px';
    cuadrado.style.top = y + 'px';
    posicionDisplay.innerText = `Posición: X=${x}, Y=${y}`;
}

function resetearPosicion() {
    x = 225;
    y = 175;
    actualizarPosicion();
}

document.addEventListener('keydown', function(event) {
    let moved = false;
    
    switch(event.key) {
        case 'ArrowUp':
            if (y > minY) {
                y -= paso;
                moved = true;
            }
            break;
            
        case 'ArrowDown':
            if (y < maxY) {
                y += paso;
                moved = true;
            }
            break;
            
        case 'ArrowLeft':
            if (x > minX) {
                x -= paso;
                moved = true;
            }
            break;
            
        case 'ArrowRight':
            if (x < maxX) {
                x += paso;
                moved = true;
            }
            break;
            
        case 'r':
        case 'R':
            resetearPosicion();
            moved = true;
            break;
    }
    
    if (['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight'].includes(event.key)) {
        event.preventDefault();
    }
    
    if (moved) {
        actualizarPosicion();
    }
});

actualizarPosicion();
