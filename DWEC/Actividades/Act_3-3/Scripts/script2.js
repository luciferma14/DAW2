function mates() {
    class Punto {
        constructor(nombre, x = 0, y = 0) {
            this.nombre = nombre;
            this.x = x;
            this.y = y;
        }

        static mostrar(punto) {
            alert(`Las coordenadas de "${punto.nombre}" son (${punto.x}, ${punto.y})`);
        }

        copiar() {
            return new Punto("punto2", this.x, this.y);
        }

        cambiar(x, y) {
            this.x = x;
            this.y = y;
        }

        static iguales(p1, p2) {
            return p1.x === p2.x && p1.y === p2.y;
        }

        sumar(p2, valor) {
            return new Punto(
                "punto3",
                this.x + p2.x + Math.floor(valor),
                this.y + p2.y + Math.ceil(valor)
            );
        }

        obtenerDistancia(p2) {
            let dx = p2.x - this.x;
            let dy = p2.y - this.y;
            return Math.sqrt(dx * dx + dy * dy);
        }
    }

    // -------------------- Programa principal --------------------

    let rango = 6;
    let x1 = prompt(`Indica la coordenada de las X (Entre -${rango} y ${rango})`);
    if (x1 === null) {
        alert("Has cancelado, el programa NO seguirá");
        return;
    }

    let y1 = prompt(`Indica la coordenada de las Y (Entre -${rango} y ${rango})`);
    if (y1 === null) {
        alert("Has cancelado, el programa NO seguirá");
        return;
    }

    x1 = Number(x1);
    y1 = Number(y1);

    if (isNaN(x1)) x1 = 0;
    if (isNaN(y1)) y1 = 0;

    if (x1 > rango) x1 = rango;
    if (x1 < -rango) x1 = -rango;
    if (y1 > rango) y1 = rango;
    if (y1 < -rango) y1 = -rango;

    let punto1 = new Punto("punto1", x1, y1);
    Punto.mostrar(punto1);

    let punto2 = punto1.copiar();
    Punto.mostrar(punto2);

    let confirmar = confirm("¿Quieres cambiar las coordenadas del segundo punto?");
    if (confirmar) {
        let nuevoX = prompt(`Nueva coordenada X (Entre -${rango} y ${rango})`);
        let nuevoY = prompt(`Nueva coordenada Y (Entre -${rango} y ${rango})`);

        if (nuevoX === null || nuevoY === null) {
            alert("Has cancelado, el programa NO seguirá");
            return;
        }

        nuevoX = Math.round(Number(nuevoX));
        nuevoY = Math.round(Number(nuevoY));

        if (isNaN(nuevoX)) nuevoX = 0;
        if (isNaN(nuevoY)) nuevoY = 0;

        if (nuevoX > rango) nuevoX = rango;
        if (nuevoX < -rango) nuevoX = -rango;
        if (nuevoY > rango) nuevoY = rango;
        if (nuevoY < -rango) nuevoY = -rango;

        punto2.cambiar(nuevoX, nuevoY);

        if (Punto.iguales(punto1, punto2)) {
            let aleatorio = Math.floor(Math.random() * (rango + 1));
            let punto3 = punto1.sumar(punto2, aleatorio);
            Punto.mostrar(punto3);
            let distancia = punto1.obtenerDistancia(punto3).toFixed(2);
            alert(`La distancia entre los puntos "${punto1.nombre}" --> (${punto1.x}, ${punto1.y}) y "${punto3.nombre}" --> (${punto3.x}, ${punto3.y}) es ${distancia}`);
        } else {
            Punto.mostrar(punto2);
            let distancia = punto1.obtenerDistancia(punto2).toFixed(2);
            alert(`La distancia entre los puntos "${punto1.nombre}" --> (${punto1.x}, ${punto1.y}) y "${punto2.nombre}" --> (${punto2.x}, ${punto2.y}) es ${distancia}`);
        }
    } else {
        let aleatorio = Math.floor(Math.random() * (rango + 1));
        let punto3 = punto1.sumar(punto2, aleatorio);
        Punto.mostrar(punto3);
        let distancia = punto1.obtenerDistancia(punto3).toFixed(2);
        alert(`La distancia entre los puntos "${punto1.nombre}" --> (${punto1.x}, ${punto1.y}) y "${punto3.nombre}" --> (${punto3.x}, ${punto3.y}) es ${distancia}`);
    }
}