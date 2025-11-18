const inventario = {
    _pesoMinimo: 5,
    _pesoMaximo: 20,
    _objetos: [],

    get capacidadDisponible(){
        return _pesoMinimo + _pesoMaximo;
    },

    set cargarObjetos(_objetos){
        return _objetos;
    }
};