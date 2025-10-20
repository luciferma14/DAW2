

function contarCaracter(event) {
        event.preventDefault();
        let texto = document.getElementById("textoBuscar").value.trim();
        let caracter = document.getElementById("caracterBuscar").value;

        if (texto.split(" ").filter(p => p !== "").length < 3) {
            document.getElementById("resultado5").textContent = "El texto debe tener al menos 3 palabras.";
            return;
        }

        if (caracter.length !== 1) {
            document.getElementById("resultado5").textContent = "Debes introducir solo un carácter.";
            return;
        }

        let contador = 0;
        for (let char of texto) {
            if (char === caracter) contador++;
        }

        document.getElementById("resultado5").textContent = `En el texto "${texto}", el carácter "${caracter}" aparece ${contador} veces.`;
    }

