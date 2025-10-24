function facturaPrompt() {
    const IVA = 0.10;
    const DESCUENTO = 0.15;
  
    const PRECIO_MENU1 = 12.5;
    const PRECIO_MENU2 = 18.75;
    const PRECIO_MENU3 = 24.8;
    const PRECIO_NINOS = 8.9;
  
    let numComensales = Number(prompt("Introduce el número total de comensales:"));
    let numMayores = Number(prompt("Introduce el número de mayores:"));
    let numNinos = Number(prompt("Introduce el número de niños:"));
    let cantidadMenu1 = Number(prompt("¿Cuántos menús tipo 1 (adultos)?"));
    let cantidadMenu2 = Number(prompt("¿Cuántos menús tipo 2 (adultos)?"));
    let cantidadMenu3 = Number(prompt("¿Cuántos menús tipo 3 (adultos)?"));
  
    if (isNaN(numComensales) || numComensales <= 0) {
      console.log("El número total de comensales no es válido.");
      return;
    }
  
    if ((numComensales - numMayores - numNinos) + numMayores + numNinos !== numComensales) {
      console.log("La suma de adultos y niños debe coincidir con el total.");
      return;
    }
  
    let cantidadMenus = (numComensales - numNinos) - (cantidadMenu1 + cantidadMenu2 + cantidadMenu3);
  
    if (cantidadMenus < 0) {
      console.log("Has indicado más menús de los que hay adultos.");
      return;
    }

    let totalAdultos = (cantidadMenu1 * PRECIO_MENU1) + (cantidadMenu2 * PRECIO_MENU2) + (cantidadMenu3 * PRECIO_MENU3);
    let descuentoAdultos = totalAdultos * DESCUENTO;
    let subtotal = (totalAdultos - descuentoAdultos) + (numNinos * PRECIO_NINOS);
    let totalFinal = subtotal * (1 + IVA);
  
    console.log(`Total comensales: ${numComensales}`);
    console.log(`Mayores: ${numMayores} | Niños: ${numNinos}`);
    console.log(`Subtotal: ${subtotal.toFixed(2)} €`);
    console.log(`IVA (10%): ${(subtotal * IVA).toFixed(2)} €`);
    console.log(`Total a pagar: ${totalFinal.toFixed(2)} €`);
  }  