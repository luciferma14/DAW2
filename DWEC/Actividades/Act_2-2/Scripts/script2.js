
function cifradoCesar() {

    let texto = prompt("Cadena a cifrar: ");
    let desplaza = parseInt(prompt("Número de desplazamientos: "));
    const abc = "abcdefghijklmnopqrstuvwxyz";
    let resultado = "";

    for (let letra of texto.toLowerCase()) {
        if (abc.includes(letra)) {
            let nuevaPos = (abc.indexOf(letra) + desplaza) % 26;
            resultado += abc[nuevaPos];
        } else {
            resultado += letra;
        }
    }

    console.log("Tu texto cifrado: " + resultado);
}