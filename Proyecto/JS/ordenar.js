document.addEventListener('DOMContentLoaded', () => {
    const filtros = {
        equipoId: document.getElementById('filtroEquipoId'),
        fecha: document.getElementById('filtroFechaParte'),
        nota: document.getElementById('filtroNota'),
        tarea: document.getElementById('filtroTarea'),
        descripcion: document.getElementById('filtroDescripcion'),
        pieza: document.getElementById('filtroPieza'),
        marca: document.getElementById('filtroMarcaPieza'),
        modelo: document.getElementById('filtroModeloPieza'),
        tiempo: document.getElementById('filtroTiempo')
    };

    const btnLimpiar = document.getElementById('btnLimpiarFiltrosTabla');

    function formatearFechaInput(inputDateStr) {
        if (!inputDateStr) return '';
        const [yyyy, mm, dd] = inputDateStr.split("-");
        return `${dd}/${mm}/${yyyy}`;
    }

    function filtrarTabla() {
        const reparaciones = document.querySelectorAll('.fromData');

        reparaciones.forEach(reparacion => {
            const filas = reparacion.querySelectorAll('tbody tr');
            let mostrarReparacion = false;

            filas.forEach(fila => {
                const celdas = fila.querySelectorAll('td');
                const valores = {
                    equipoId: celdas[0]?.textContent.toLowerCase(),
                    fecha: celdas[1]?.textContent.toLowerCase(),
                    nota: celdas[2]?.textContent.toLowerCase(),
                    tarea: celdas[3]?.textContent.toLowerCase(),
                    descripcion: celdas[4]?.textContent.toLowerCase(),
                    pieza: celdas[5]?.textContent.toLowerCase(),
                    marca: celdas[6]?.textContent.toLowerCase(),
                    modelo: celdas[7]?.textContent.toLowerCase(),
                    tiempo: celdas[8]?.textContent.toLowerCase()
                };

                let visible = true;

                for (let campo in filtros) {
                    let filtro = filtros[campo].value.trim().toLowerCase();

                    if (campo === 'fecha' && filtro) {
                        const fechaInputFormateada = formatearFechaInput(filtro).toLowerCase();
                        if (!valores.fecha.includes(fechaInputFormateada)) {
                            visible = false;
                            break;
                        }
                    } else if (filtro && !valores[campo].includes(filtro)) {
                        visible = false;
                        break;
                    }
                }

                fila.style.display = visible ? '' : 'none';
                if (visible) mostrarReparacion = true;
            });

            reparacion.style.display = mostrarReparacion ? '' : 'none';
        });
    }

    Object.values(filtros).forEach(input => {
        input.addEventListener('input', filtrarTabla);
    });

    btnLimpiar.addEventListener('click', () => {
        Object.values(filtros).forEach(input => input.value = '');
        filtrarTabla();
    });
});
