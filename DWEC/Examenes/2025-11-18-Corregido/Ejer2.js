const inventario = {
    _pesoMinimo: 5,
    _pesoMaximo: 20,
    _objetos: [],

    // Getter: devuelve array entre min y max
    get capacidadDisponible() {
        const resultado = [];
        for (let i = this._pesoMinimo; i <= this._pesoMaximo; i++) {
            resultado.push(i);
        }
        return resultado;
    },

    // Setter: añade objetos al array interno
    set cargarObjetos(listaObjetos) {
        if (Array.isArray(listaObjetos)) {
            this._objetos.push(...listaObjetos);
        }
    }
};

// Mostrar resultados
console.log("Capacidad Disponible:", inventario.capacidadDisponible);

inventario.cargarObjetos = ["Espada Épica", "Poción de Vida", "Mapa Antiguo"];

console.log("Objetos en Inventario:", inventario._objetos);
