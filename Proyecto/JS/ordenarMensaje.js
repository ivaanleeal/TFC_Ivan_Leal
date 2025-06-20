document.addEventListener('DOMContentLoaded', () => {
    const filtroId = document.getElementById('filtroId');
    const filtroNombre = document.getElementById('filtroNombre');
    const filtroApellidos = document.getElementById('filtroApellidos');
    const filtroCorreo = document.getElementById('filtroCorreo');
    const filtroMensaje = document.getElementById('filtroMensaje');
    const btnLimpiarFiltros = document.getElementById('btnLimpiarFiltros');
    const mensajes = document.querySelectorAll('#contenedormensajes tbody tr');

    // Función de filtrado
    function filtrarMensajes() {
        const textoId = filtroId.value.toLowerCase();
        const textoNombre = filtroNombre.value.toLowerCase();
        const textoApellidos = filtroApellidos.value.toLowerCase();
        const textoCorreo = filtroCorreo.value.toLowerCase();
        const textoMensaje = filtroMensaje.value.toLowerCase();

        mensajes.forEach(mensaje => {
            const celdas = mensaje.getElementsByTagName('td');
            const id = celdas[0].textContent.toLowerCase(); // Columna ID
            const nombre = celdas[1].textContent.toLowerCase();
            const apellidos = celdas[2].textContent.toLowerCase();
            const correo = celdas[3].textContent.toLowerCase();
            const mensajeTexto = celdas[4].textContent.toLowerCase();

            // Verificar si cada campo contiene el texto de búsqueda
            const coincideId = id.includes(textoId);
            const coincideNombre = nombre.includes(textoNombre);
            const coincideApellidos = apellidos.includes(textoApellidos);
            const coincideCorreo = correo.includes(textoCorreo);
            const coincideMensaje = mensajeTexto.includes(textoMensaje);

            // Si todos los filtros coinciden, mostrar la fila
            if (coincideId && coincideNombre && coincideApellidos && coincideCorreo && coincideMensaje) {
                mensaje.style.display = '';
            } else {
                mensaje.style.display = 'none';
            }
        });
    }

    // Limpiar filtros
    btnLimpiarFiltros.addEventListener('click', () => {
        filtroId.value = '';
        filtroNombre.value = '';
        filtroApellidos.value = '';
        filtroCorreo.value = '';
        filtroMensaje.value = '';
        filtrarMensajes();
    });

    // Filtros en tiempo real
    filtroId.addEventListener('input', filtrarMensajes);
    filtroNombre.addEventListener('input', filtrarMensajes);
    filtroApellidos.addEventListener('input', filtrarMensajes);
    filtroCorreo.addEventListener('input', filtrarMensajes);
    filtroMensaje.addEventListener('input', filtrarMensajes);

    // Marcar mensaje como leído al hacer clic en el checkbox
    const checkboxes = document.querySelectorAll('.checkbox-visto');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            const id = e.target.getAttribute('data-id');
            const estadoLeido = e.target.checked ? 1 : 0;
            
            // Enviar solicitud para actualizar el estado de leído
            fetch(`index.php?c=mensaje&a=marcarComoLeido&id=${id}&leido=${estadoLeido}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(`Mensaje ${id} actualizado correctamente.`);
                    } else {
                        console.log(`Error al actualizar el mensaje ${id}.`);
                    }
                })
                .catch(error => console.error('Error al actualizar el mensaje:', error));
        });
    });

    // Filtrado inicial
    filtrarMensajes();
});
