function fechas(){
    let fecha1 = prompt("Introduce la primera fecha (dd/mm/aaaa):");
    let fecha2 = prompt("Introduce la segunda fecha (dd/mm/aaaa):");

    function esFechaValida(fecha) {
        let partes = fecha.split("/");
        if (partes.length !== 3) return false;
        let dia = parseInt(partes[0]);
        let mes = parseInt(partes[1]) - 1;
        let anio = parseInt(partes[2]);
        let f = new Date(anio, mes, dia);
        return f.getDate() === dia && f.getMonth() === mes && f.getFullYear() === anio;
    }

    while (!esFechaValida(fecha1)) {
        fecha1 = prompt("Fecha 1 incorrecta. Vuelve a introducirla (dd/mm/aaaa):");
        if (fecha1 === null) break;
    }
    while (!esFechaValida(fecha2)) {
        fecha2 = prompt("Fecha 2 incorrecta. Vuelve a introducirla (dd/mm/aaaa):");
        if (fecha2 === null) break;
    }

    let [d1, m1, a1] = fecha1.split("/").map(Number);
    let [d2, m2, a2] = fecha2.split("/").map(Number);
    let f1 = new Date(a1, m1 - 1, d1);
    let f2 = new Date(a2, m2 - 1, d2);

    let diferencia = Math.abs(f1 - f2);
    let dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));

    let a = 0, m = 0, d = 0;
    if (f1 > f2) [f1, f2] = [f2, f1];

    a = f2.getFullYear() - f1.getFullYear();
    m = f2.getMonth() - f1.getMonth();
    d = f2.getDate() - f1.getDate();

    if (d < 0) {
        m--;
        let ultimoDiaMesAnterior = new Date(f2.getFullYear(), f2.getMonth(), 0).getDate();
        d += ultimoDiaMesAnterior;
    }
    if (m < 0) {
        a--;
        m += 12;
    }

    console.log(`Entre ${fecha1} y ${fecha2} hay ${dias} días:`);
    console.log(`${a} años, ${m} meses y ${d} días`);
}