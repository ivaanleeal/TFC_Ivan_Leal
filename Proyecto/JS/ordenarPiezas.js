document.addEventListener('DOMContentLoaded', () => {
    const filtros = {
        codigo: document.getElementById('filtroCodigo'),
        nombre: document.getElementById('filtroNombre'),
        marca: document.getElementById('filtroMarca'),
        modelo: document.getElementById('filtroModelo')
    };

    const btnLimpiar = document.getElementById('btnLimpiarFiltros');
    const piezas = document.querySelectorAll('#contenedorPiezass .fromData');

    function filtrarPiezas() {
        const valoresFiltro = {
            codigo: filtros.codigo.value.trim().toLowerCase(),
            nombre: filtros.nombre.value.trim().toLowerCase(),
            marca: filtros.marca.value.trim().toLowerCase(),
            modelo: filtros.modelo.value.trim().toLowerCase()
        };

        piezas.forEach(pieza => {
            const codigo = pieza.querySelector('h2')?.textContent.toLowerCase() || '';
            const celdas = pieza.querySelectorAll('tbody tr td');
            const nombre = celdas[0]?.textContent.toLowerCase() || '';
            const marca = celdas[1]?.textContent.toLowerCase() || '';
            const modelo = celdas[2]?.textContent.toLowerCase() || '';

            const coincide =
                codigo.includes(valoresFiltro.codigo) &&
                nombre.includes(valoresFiltro.nombre) &&
                marca.includes(valoresFiltro.marca) &&
                modelo.includes(valoresFiltro.modelo);

            pieza.style.display = coincide ? '' : 'none';
        });
    }

    Object.values(filtros).forEach(input => {
        input.addEventListener('input', filtrarPiezas);
    });

    btnLimpiar.addEventListener('click', () => {
        Object.values(filtros).forEach(input => input.value = '');
        filtrarPiezas();
    });

    filtrarPiezas();
});
