

function cifradoCesar(event) {
    event.preventDefault();
    let texto = document.getElementById("texto").value;
    let desplaza = parseInt(document.getElementById("desplaza").value);
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

    return document.getElementById("resultado2").textContent = "'" + texto + "'" + " se ha convertido en  " + resultado;

}