const filtroTexto = document.getElementById('filtroTabla');
    const filtroFecha = document.getElementById('filtroFecha');
    const btnLimpiar = document.getElementById('btnLimpiarFiltros');
    const btnOrdenar = document.getElementById('btnOrdenarFechas');

    let ordenAscendente = false;

    function filtrarDatos() {
        const texto = filtroTexto.value.toLowerCase();
        const fecha = filtroFecha.value;
        const tablas = document.querySelectorAll('.fromData');

        tablas.forEach(tabla => {
            const contenido = tabla.innerText.toLowerCase();
            const fechaElemento = tabla.querySelector('h3:nth-child(2)');
            let fechaTexto = '';

            if (fechaElemento) {
                const partes = fechaElemento.textContent.match(/(\d{2})\/(\d{2})\/(\d{4})/);
                if (partes) {
                    fechaTexto = `${partes[3]}-${partes[2]}-${partes[1]}`;
                }
            }

            const coincideTexto = contenido.includes(texto);
            const coincideFecha = fecha === '' || fecha === fechaTexto;

            tabla.style.display = coincideTexto && coincideFecha ? '' : 'none';
        });
    }

    filtroTexto.addEventListener('keyup', filtrarDatos);
    filtroFecha.addEventListener('change', filtrarDatos);

    
    btnLimpiar.addEventListener('click', () => {
        filtroTexto.value = '';
        filtroFecha.value = '';
        filtrarDatos();
    });

    
    btnOrdenar.addEventListener('click',ordenar);
    window.addEventListener('load',ordenar);

    function ordenar(){
        const contenedor = document.querySelector('section');
        const tablas = Array.from(document.querySelectorAll('.fromData'));

        tablas.sort((a, b) => {
            const fechaA = a.querySelector('h3:nth-child(3)').textContent.match(/(\d{2})\/(\d{2})\/(\d{4})/);
            const fechaB = b.querySelector('h3:nth-child(3)').textContent.match(/(\d{2})\/(\d{2})\/(\d{4})/);

            const dateA = new Date(`${fechaA[3]}-${fechaA[2]}-${fechaA[1]}`);
            const dateB = new Date(`${fechaB[3]}-${fechaB[2]}-${fechaB[1]}`);

            return ordenAscendente ? dateA - dateB : dateB - dateA;
        });

        tablas.forEach(tabla => contenedor.appendChild(tabla));

        ordenAscendente = !ordenAscendente;
        btnOrdenar.textContent = ordenAscendente ? 'Ordenar: Más antiguos ↑' : 'Ordenar: Más recientes ↓';
    }