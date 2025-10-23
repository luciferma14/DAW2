export function mostrarEstaciones(estaciones) {
  const tbody = document.querySelector('#valenbisi-table tbody');
  tbody.innerHTML = '';

  estaciones.forEach(station => {
    const porcentaje = Math.round((station.available / station.total) * 100);

    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${station.number}</td>
      <td>${station.address}</td>
      <td>${station.available}</td>
      <td>${station.free}</td>
      <td>${station.total}</td>
      <td>${station.updated_at}</td> <!-- Última actualización -->
      <td>
        <div class="progress-container">
          <div class="progress-filled" style="width: ${porcentaje}%;"></div>
          <div class="progress-empty" style="width: ${100 - porcentaje}%;"></div>
        </div>
      </td>
    `;
    tbody.appendChild(tr);
  });
}
