// Filtros para partes
const filtrosParte = {
    numeroParte: document.getElementById('filtroNumeroParte'),
    fecha: document.getElementById('filtroFecha'),
    notas: document.getElementById('filtroNotas'),
    seguimiento: document.getElementById('filtroSeguimiento'),
    recogido: document.getElementById('filtroRecogido'),
    cliente: document.getElementById('filtroCliente'),
    equipo: document.getElementById('filtroEquipo'),
    empleado: document.getElementById('filtroEmpleado')
};

const btnLimpiarParte = document.getElementById('btnLimpiarFiltrosParte');
const btnOrdenarParte = document.getElementById('btnOrdenarPartes');
let ordenAscendenteParte = true;

function formatearFechaInput(inputDateStr) {
    // Convierte yyyy-mm-dd a dd/mm/yyyy
    if (!inputDateStr) return '';
    const [yyyy, mm, dd] = inputDateStr.split("-");
    return `${dd}/${mm}/${yyyy}`;
}

function filtrarPartes() {
    const partes = document.querySelectorAll('#contenedorpartes .fromData');

    partes.forEach(parte => {
        const celdas = parte.querySelectorAll('tbody td');

        const valores = {
            numeroParte: celdas[0]?.textContent.toLowerCase() || '',
            fecha: celdas[1]?.textContent.toLowerCase() || '',
            notas: celdas[2]?.textContent.toLowerCase() || '',
            seguimiento: celdas[3]?.textContent.toLowerCase() || '',
            recogido: celdas[4]?.textContent.toLowerCase() || '',
            cliente: celdas[5]?.textContent.toLowerCase() || '',
            equipo: celdas[6]?.textContent.toLowerCase() || '',
            empleado: celdas[7]?.textContent.toLowerCase() || ''
        };

        let visible = true;
        for (const campo in filtrosParte) {
            let textoFiltro = filtrosParte[campo].value.trim().toLowerCase();

            if (campo === "fecha" && textoFiltro) {
                // Compara fechas convertidas
                const fechaInput = formatearFechaInput(filtrosParte.fecha.value).toLowerCase();
                if (!valores.fecha.includes(fechaInput)) {
                    visible = false;
                    break;
                }
            } else if (textoFiltro && !valores[campo].includes(textoFiltro)) {
                visible = false;
                break;
            }
        }

        parte.style.display = visible ? '' : 'none';
    });
}

// Eventos de input
for (const campo in filtrosParte) {
    filtrosParte[campo].addEventListener('input', filtrarPartes);
}

// Limpiar filtros
btnLimpiarParte.addEventListener('click', () => {
    for (const campo in filtrosParte) {
        filtrosParte[campo].value = '';
    }
    filtrarPartes();
});

// Ordenar por número de parte (numérico o alfabético según cómo se use)
btnOrdenarParte.addEventListener('click', ordenarPartes);

function ordenarPartes() {
    const contenedor = document.getElementById('contenedorpartes');
    const partes = Array.from(contenedor.querySelectorAll('.fromData'));

    partes.sort((a, b) => {
        const valA = a.querySelector('tbody td')?.textContent.trim().toLowerCase() || '';
        const valB = b.querySelector('tbody td')?.textContent.trim().toLowerCase() || '';

        // Ordenar como números si son enteros
        const numA = parseInt(valA);
        const numB = parseInt(valB);
        const isNumeric = !isNaN(numA) && !isNaN(numB);

        if (isNumeric) {
            return ordenAscendenteParte ? numA - numB : numB - numA;
        } else {
            return ordenAscendenteParte ? valA.localeCompare(valB) : valB.localeCompare(valA);
        }
    });

    partes.forEach(p => contenedor.appendChild(p));
    ordenAscendenteParte = !ordenAscendenteParte;
    btnOrdenarParte.textContent = ordenAscendenteParte ? 'Ordenar por Nº Parte ↑' : 'Ordenar por Nº Parte ↓';
}

// Inicial
window.addEventListener('load', () => {
    filtrarPartes();
    ordenarPartes();
});
