const filtros = {
    telefono: document.getElementById('filtroTelefono'),
    nombre: document.getElementById('filtroNombre'),
    apellidos: document.getElementById('filtroApellidos'),
    usuario: document.getElementById('filtroUsuario'),
    privilegio: document.getElementById('filtroPrivilegio'),
    whatsap: document.getElementById('filtroWhatsap'),
    llamar: document.getElementById('filtroLlamar')
};

const btnLimpiar = document.getElementById('btnLimpiarFiltros');
const btnOrdenar = document.getElementById('btnOrdenarNombres');
let ordenAscendente = true;


function filtrarDatos() {
    const tarjetas = Array.from(document.querySelectorAll('#contenedorClientes .fromData'));

    tarjetas.forEach(tarjeta => {
        const celdas = tarjeta.querySelectorAll('tbody td');

        const valores = {
            telefono: celdas[0]?.textContent.toLowerCase() || '',
            nombre: celdas[1]?.textContent.toLowerCase() || '',
            apellidos: celdas[2]?.textContent.toLowerCase() || '',
            usuario: celdas[3]?.textContent.toLowerCase() || '',
            privilegio: celdas[5]?.textContent.toLowerCase() || '',
            whatsap: celdas[6]?.textContent.toLowerCase() || '',
            llamar: celdas[7]?.textContent.toLowerCase() || ''
        };

        let visible = true;
        for (const campo in filtros) {
            const textoFiltro = filtros[campo].value.trim().toLowerCase();
            if (textoFiltro && !valores[campo].includes(textoFiltro)) {
                visible = false;
                break;
            }
        }

        tarjeta.style.display = visible ? '' : 'none';
    });
}



for (const campo in filtros) {
    filtros[campo].addEventListener('input', filtrarDatos);
}


btnLimpiar.addEventListener('click', () => {
    for (const campo in filtros) {
        filtros[campo].value = '';
    }
    filtrarDatos();
});


btnOrdenar.addEventListener('click', ordenarNombres);

function ordenarNombres() {
    const contenedor = document.getElementById('contenedorClientes');
    const tarjetas = Array.from(document.querySelectorAll('#contenedorClientes .fromData'));

    tarjetas.sort((a, b) => {
        const nombreA = a.querySelector('tbody td:nth-child(2)')?.textContent.toLowerCase() || '';
        const nombreB = b.querySelector('tbody td:nth-child(2)')?.textContent.toLowerCase() || '';
        return ordenAscendente ? nombreA.localeCompare(nombreB) : nombreB.localeCompare(nombreA);
    });

    tarjetas.forEach(t => contenedor.appendChild(t));
    ordenAscendente = !ordenAscendente;
    btnOrdenar.textContent = ordenAscendente ? 'Ordenar A-Z' : 'Ordenar Z-A';
}


window.addEventListener('load', () => {
    filtrarDatos();
    ordenarNombres();
});
