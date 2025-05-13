document.addEventListener('DOMContentLoaded', () => {
    const filtros = {
        codigo: document.getElementById('filtroCodigo'),
        marca: document.getElementById('filtroMarca'),
        modelo: document.getElementById('filtroModelo'),
        so: document.getElementById('filtroSO'),
        cliente: document.getElementById('filtroCliente')
    };

    const btnLimpiar = document.getElementById('btnLimpiarFiltros');
    const contenedores = document.querySelectorAll('#contenedorEquipos .fromData');

    function filtrarEquipos() {
        const filtroValores = {
            codigo: filtros.codigo.value.trim().toLowerCase(),
            marca: filtros.marca.value.trim().toLowerCase(),
            modelo: filtros.modelo.value.trim().toLowerCase(),
            so: filtros.so.value.trim().toLowerCase(),
            cliente: filtros.cliente.value.trim().toLowerCase()
        };

        contenedores.forEach(contenedor => {
            const codigo = contenedor.querySelector('h2')?.textContent.toLowerCase() || '';
            const celdas = contenedor.querySelectorAll('tbody tr td');

            const marca = celdas[0]?.textContent.toLowerCase() || '';
            const modelo = celdas[1]?.textContent.toLowerCase() || '';
            const so = celdas[2]?.textContent.toLowerCase() || '';
            const cliente = celdas[3]?.textContent.toLowerCase() || '';

            const coincide =
                codigo.includes(filtroValores.codigo) &&
                marca.includes(filtroValores.marca) &&
                modelo.includes(filtroValores.modelo) &&
                so.includes(filtroValores.so) &&
                cliente.includes(filtroValores.cliente);

            contenedor.style.display = coincide ? '' : 'none';
        });
    }

    Object.values(filtros).forEach(input => {
        input.addEventListener('input', filtrarEquipos);
    });

    btnLimpiar.addEventListener('click', () => {
        Object.values(filtros).forEach(input => input.value = '');
        filtrarEquipos();
    });

    filtrarEquipos();
});

