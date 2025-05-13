document.addEventListener('DOMContentLoaded', () => {
    const filtros = {
        dni: document.getElementById('filtroDni'),
        nombre: document.getElementById('filtroNombre'),
        apellidos: document.getElementById('filtroApellidos')
    };

    const btnLimpiar = document.getElementById('btnLimpiarFiltros');
    const contenedores = document.querySelectorAll('#contenedorClientes .fromData');

    function filtrarEmpleados() {
        const dniFiltro = filtros.dni.value.trim().toLowerCase();
        const nombreFiltro = filtros.nombre.value.trim().toLowerCase();
        const apellidosFiltro = filtros.apellidos.value.trim().toLowerCase();

        contenedores.forEach(contenedor => {
            const dni = contenedor.querySelector('h2')?.textContent.toLowerCase() || '';
            const nombre = contenedor.querySelector('td:nth-child(1)')?.textContent.toLowerCase() || '';
            const apellidos = contenedor.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';

            const coincideDni = dni.includes(dniFiltro);
            const coincideNombre = nombre.includes(nombreFiltro);
            const coincideApellidos = apellidos.includes(apellidosFiltro);

            const visible = coincideDni && coincideNombre && coincideApellidos;

            contenedor.style.display = visible ? '' : 'none';
        });
    }

    Object.values(filtros).forEach(input => {
        input.addEventListener('input', filtrarEmpleados);
    });

    btnLimpiar.addEventListener('click', () => {
        Object.values(filtros).forEach(input => input.value = '');
        filtrarEmpleados();
    });

    filtrarEmpleados(); // En caso de inputs ya con texto
});
