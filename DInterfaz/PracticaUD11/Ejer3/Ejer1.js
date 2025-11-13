const formulario = document.getElementById("formulario");
const nombre = document.getElementById("nombre");
const email = document.getElementById("email");
const errores = document.getElementById("errores");

formulario.addEventListener("submit", function(){
    event.preventDefault();
    errores.innerHTML = "";

    let hayErrores = false;

    if(nombre.value.trim().length < 2){
        errores.innerHTML += "<p>El nombre debe tener al menos 2 caracteres</p>";
        hayErrores = true;  
    }

    if(!email.value.includes("@")){
        errores.innerHTML += "<p>El email debe contener '@'</p>";
        hayErrores = true;
    }

    if(nombre.value.trim() === "" || email.value.trim() === ""){
        errores.innerHTML += "<p>Todos los campos son obligatorios</p>";
        hayErrores = true;
    }

    if(!hayErrores){
        errores.innerHTML = '<p class="exito">Formulario válido!</p>';
        formulario.reset();
    }
});