export class Vista{
    constructor({mapId}){
        this.mapId = mapId;
        this.mapa = null;
        this.markers = [];
        this.usuario = null;
        this._initMapa();
    }


    _initMapa(){
        this.mapa = L.map(this.mapId).setView([39.4699,-0.3763], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
            maxZoom:19,
            attribution:'OpenStreetMap'
        }).addTo(this.mapa);


        const div = L.DomUtil.create('div','legend');
        div.innerHTML = '<strong>Disponibilidad</strong><br><small>Verde: alta · Naranja: media · Rojo: baja</small>';
        const legend = L.control({position:'topright'});
        legend.onAdd = () => div;
        legend.addTo(this.mapa);
    }


    setUsuario([lat,lon]){
        this.usuario = [lat,lon];
        if (this._usuarioMarker) this.mapa.removeLayer(this._usuarioMarker);
        this._usuarioMarker = L.circleMarker([lat,lon], {radius:8, color:'purple'}).addTo(this.mapa).bindPopup('Tu ubicación').openPopup();
        this.mapa.setView([lat,lon], 14);
    }


    mostrarEstaciones(estaciones){
        this.markers.forEach(m => this.mapa.removeLayer(m));
        this.markers = [];


        estaciones.forEach(e => {
            const color = this._colorDisponibilidad(e.bicicletas, e.total);
            const marker = L.circleMarker([e.lat, e.lon], {
                radius:8, color
            }).addTo(this.mapa)
            .bindPopup(`<strong>${e.direccion}</strong><br>Bicis: ${e.bicicletas}<br>Anclajes libres: ${e.anclajes_libres}<br>Distancia: ${e.distancia} m<br><small>${e.actualizado}</small>`);
            this.markers.push(marker);
        });


        this._renderTabla(estaciones);
    }


    _renderTabla(estaciones){
        const tbody = document.querySelector('#tabla-estaciones tbody');
        tbody.innerHTML = '';
        estaciones.forEach(e => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${e.id}</td><td>${e.direccion}</td><td>${e.bicicletas}</td><td>${e.anclajes_libres}</td><td>${e.total}</td><td>${e.distancia}</td><td>${e.actualizado}</td>`;
            tbody.appendChild(tr);
        });
    }


    _colorDisponibilidad(bicis,total){
        const ratio = total > 0 ? bicis / total : 0;
        if (ratio >= 0.6) return 'green';
        if (ratio >= 0.3) return 'orange';
        return 'red';
    }

    mostrarError(msg){ alert(msg); }
}