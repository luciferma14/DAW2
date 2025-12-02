function mostrarReloj(){
    const ahora =  new Date();
    let horas = ahora.getHours();
    let minutos = ahora.getMinutes();
    let segundos = ahora.getSeconds();

    horas = horas < 10 ? "0" + horas : horas; 
    minutos = minutos < 10 ? "0" + minutos : minutos;
    segundos = segundos < 10 ? "0" + segundos : segundos;
    const horaFormateada = `${horas}:${minutos}:${segundos}`;

    const diasSemana = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
    const meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    const diaSemana = diasSemana[ahora.getDay()];
    const diaMes = ahora.getDate();
    const mes = meses[ahora.getMonth()];
    const fechaFormateada = `${diaSemana}, ${diaMes} ${mes}`;

    document.getElementById('hora').textContent = horaFormateada;
    document.getElementById('fecha').textContent = fechaFormateada;

    const relojContainer = document.getElementById('contenedor');

    relojContainer.classList.toggle('animar');
}

setInterval(mostrarReloj, 1000);