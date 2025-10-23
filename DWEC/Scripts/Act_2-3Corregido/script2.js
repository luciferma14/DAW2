function facturaPrompt() {
    const IVA = 0.10;
    const DESCUENTO = 0.15;
    const menu1 = 12.50, menu2 = 18.75, menu3 = 25.40, menuNino = 8.90;

    let total = parseInt(prompt("¿Cuántos comensales hay?"));
    let mayores = parseInt(prompt("¿Cuántos son mayores de 65 años?"));
    let ninos = parseInt(prompt("¿Cuántos son menores de 10 años (menú infantil)?"));

    if (isNaN(total) || isNaN(mayores) || isNaN(ninos) || mayores + ninos > total) {
        alert("Datos inválidos. Revisa los valores introducidos.");
        return;
    }

    let adultos = total - mayores - ninos;

    let m1 = parseInt(prompt("¿Cuántos comerán el menú 1 (12.50 €)?"));
    let m2 = parseInt(prompt("¿Cuántos comerán el menú 2 (18.75 €)?"));
    let m3 = parseInt(prompt("¿Cuántos comerán el menú 3 (25.40 €)?"));

    let totalMenusAdultos = m1 + m2 + m3;

    if (totalMenusAdultos !== adultos + mayores) {
        document.getElementById("resultado2").innerHTML =
            `Error: has asignado ${totalMenusAdultos} menús adultos, pero hay ${(adultos + mayores)} adultos (mayores incluidos).`;
        return;
    }

    let total1 = m1 * menu1;
    let total2 = m2 * menu2;
    let total3 = m3 * menu3;
    let totalNinos = ninos * menuNino;

    let descuentoTotal = 0;
    if (mayores > 0) {
        let listaMenus = [];
        for (let i = 0; i < m1; i++) listaMenus.push(menu1);
        for (let i = 0; i < m2; i++) listaMenus.push(menu2);
        for (let i = 0; i < m3; i++) listaMenus.push(menu3);
        listaMenus.sort((a, b) => a - b);

        for (let i = 0; i < mayores && i < listaMenus.length; i++) {
            descuentoTotal += listaMenus[i] * DESCUENTO;
        }
    }

    let subtotal = total1 + total2 + total3 + totalNinos - descuentoTotal;
    let ivaTotal = subtotal * IVA;
    let totalFinal = subtotal + ivaTotal;

    let html = `<h3>Resumen de la factura</h3>
    <p>Total comensales: ${total}</p>
    <p>Adultos: ${adultos} | Mayores: ${mayores} | Niños: ${ninos}</p>
    <ul>
      <li>Menú 1: ${m1} x ${menu1.toFixed(2)}€ = ${(total1).toFixed(2)}€</li>
      <li>Menú 2: ${m2} x ${menu2.toFixed(2)}€ = ${(total2).toFixed(2)}€</li>
      <li>Menú 3: ${m3} x ${menu3.toFixed(2)}€ = ${(total3).toFixed(2)}€</li>
      <li>Menú infantil: ${ninos} x ${menuNino.toFixed(2)}€ = ${(totalNinos).toFixed(2)}€</li>
    </ul>`;

    if (mayores > 0) {
        html += `<p>Descuento (15%) aplicado a ${mayores} menú(s) más económico(s): -${descuentoTotal.toFixed(2)}€</p>`;
    }

    html += `<hr>
    <p><strong>Total sin IVA:</strong> ${subtotal.toFixed(2)} €</p>
    <p><strong>IVA (10%):</strong> ${ivaTotal.toFixed(2)} €</p>
    <p><strong>Total con IVA:</strong> ${totalFinal.toFixed(2)} €</p>`;

    document.getElementById("resultado2").innerHTML = html;
}
