document.addEventListener('DOMContentLoaded', () => {
    const filtros = {
        numeroParte: document.getElementById('filtroNumeroParte'),
        numeroTarea: document.getElementById('filtroNumeroTarea'),
        descripcion: document.getElementById('filtroDescripcion'),
        estado: document.getElementById('filtroEstado'),
        tiempo: document.getElementById('filtroTiempo'),
        empleado: document.getElementById('filtroEmpleado'),
        cliente: document.getElementById('filtroCliente')
    };

    const btnLimpiar = document.getElementById('btnLimpiarFiltrosTarea');
    const btnOrdenar = document.getElementById('btnOrdenarTareas');

    let ordenAsc = true;

    function filtrarTareas() {
        const tareas = document.querySelectorAll('#contenedortareas .fromData');

        tareas.forEach(tarea => {
            const celdas = tarea.querySelectorAll('tbody td');
            const valores = {
                numeroParte: celdas[0]?.textContent.toLowerCase() || '',
                numeroTarea: celdas[1]?.textContent.toLowerCase() || '',
                descripcion: celdas[2]?.textContent.toLowerCase() || '',
                estado: celdas[3]?.textContent.toLowerCase() || '',
                tiempo: celdas[4]?.textContent.toLowerCase() || '',
                empleado: celdas[6]?.textContent.toLowerCase() || '',
                cliente: celdas[7]?.textContent.toLowerCase() || ''
            };

            let visible = true;
            for (let campo in filtros) {
                const texto = filtros[campo].value.trim().toLowerCase();
                if (texto !== '' && !valores[campo].includes(texto)) {
                    visible = false;
                    break;
                }
            }

            tarea.style.display = visible ? '' : 'none';
        });
    }

    Object.values(filtros).forEach(input => {
        input.addEventListener('input', filtrarTareas);
    });

    btnLimpiar.addEventListener('click', () => {
        Object.values(filtros).forEach(input => input.value = '');
        filtrarTareas();
    });

    btnOrdenar.addEventListener('click', () => {
        const contenedor = document.getElementById('contenedortareas');
        const tareas = Array.from(contenedor.querySelectorAll('.fromData'));

        tareas.sort((a, b) => {
            const aVal = a.querySelector('tbody td:nth-child(2)').textContent.trim().toLowerCase();
            const bVal = b.querySelector('tbody td:nth-child(2)').textContent.trim().toLowerCase();
            return ordenAsc ? aVal.localeCompare(bVal) : bVal.localeCompare(aVal);
        });

        tareas.forEach(tarea => contenedor.appendChild(tarea));
        ordenAsc = !ordenAsc;
    });
});
