
/***********************************************
******************Elementos*********************
************************************************/
console.log("------ Ejemplos tipos de elementos --------")
string = "45 gatos caminan en 7 calles";
//Comodín universal *
console.log(string.match(/./g));
//letras, num y _
console.log(string.match(/\w/g));
//NO letras, num y _
console.log(string.match(/\W/g));
//números
console.log(string.match(/\d/g));
//NO números
console.log(string.match(/\D/g));
//espacios
console.log(string.match(/\s/g));
//NO espacios
console.log(string.match(/\S./g));

