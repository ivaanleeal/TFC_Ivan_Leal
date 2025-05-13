document.addEventListener('DOMContentLoaded', () => {
    const filtros = {
        parte: document.getElementById('filtroParte'),
        tarea: document.getElementById('filtroTarea'),
        pieza: document.getElementById('filtroPieza')
    };

    const btnLimpiar = document.getElementById('btnLimpiarFiltros');
    const reparaciones = document.querySelectorAll('#contenedorReparación .fromData');

    function filtrarReparaciones() {
        const valoresFiltro = {
            parte: filtros.parte.value.trim().toLowerCase(),
            tarea: filtros.tarea.value.trim().toLowerCase(),
            pieza: filtros.pieza.value.trim().toLowerCase()
        };

        reparaciones.forEach(reparacion => {
            const celdas = reparacion.querySelectorAll('tbody tr td');
            const numeroParte = celdas[0]?.textContent.toLowerCase() || '';
            const numeroTarea = celdas[1]?.textContent.toLowerCase() || '';
            const pieza = celdas[2]?.textContent.toLowerCase() || '';

            const coincide =
                numeroParte.includes(valoresFiltro.parte) &&
                numeroTarea.includes(valoresFiltro.tarea) &&
                pieza.includes(valoresFiltro.pieza);

            reparacion.style.display = coincide ? '' : 'none';
        });
    }

    Object.values(filtros).forEach(input => {
        input.addEventListener('input', filtrarReparaciones);
    });

    btnLimpiar.addEventListener('click', () => {
        Object.values(filtros).forEach(input => input.value = '');
        filtrarReparaciones();
    });

    filtrarReparaciones();
});
