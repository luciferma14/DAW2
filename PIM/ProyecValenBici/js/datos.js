async function fetchValenbisi() {
    const total = 300; // Total de registros
    const tbody = document.querySelector('#valenbisi-table tbody');
    tbody.innerHTML = ''; // limpiar tabla

    for (let offset = 0; offset < total; offset += 100) {
        const url = `https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records?order_by=number&limit=100&offset=${offset}`;
        try {
        const response = await fetch(url);
        if (!response.ok) throw new Error('Error HTTP: ' + response.status);
        const data = await response.json();
        const records = data.results;

        records.forEach(station => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
            <td>${station.number}</td>
            <td>${station.address}</td>
            <td>${station.available}</td>
            <td>${station.free}</td>
            <td>${station.total}</td>
            <td>${station.updated_at}</td>
            `;
            tbody.appendChild(tr);
        });

        } catch (error) {
        console.error('Hubo un problema:', error);
        tbody.innerHTML += `<tr><td colspan="6">Error al cargar datos en offset ${offset}</td></tr>`;
        }
    }
}

window.addEventListener('DOMContentLoaded', fetchValenbisi);