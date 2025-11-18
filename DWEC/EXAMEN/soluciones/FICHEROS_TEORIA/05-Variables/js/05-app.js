/***************************************
 *********DECLARACIÓN CON CONST*********
 ***************************************/
console.log("-----CONSTANTES-----");
//No se puede reasignar el valor
const curso = "2DAW";
//curso = "2DAM"; // Al descomentar da error pues una variable const no se puede reasignar
console.log(curso);//Da error


//Deben inicializarse en su declaración
//const precio; // Da ERROR, se debe asignar un valor inicial
const descuento = 35; //NO da error
console.log("descuento vale: " + descuento);


/***************************************
 *************SCOPE DE CONST************
 ***************************************/

 const cliente = "Javier";
 const login = false;

 function mostrarCte(){
    const cliente = "Pedro";
    console.log("En el ambito local la const cliente vale: " + cliente);

    if (login){
        const cliente = "Admin";
        console.log(cliente);
    }
 }
 mostrarCte();

 


