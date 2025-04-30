const filtroTexto = document.getElementById('filtroTexto');
const btnLimpiar = document.getElementById('btnLimpiarFiltros');
const contenedor = document.getElementById('contenedorpartes');

const btnOrdenarParte = document.getElementById('ordenarParte');
const btnOrdenarFecha = document.getElementById('ordenarFecha');
const btnOrdenarCliente = document.getElementById('ordenarCliente');
const btnOrdenarEquipo = document.getElementById('ordenarEquipo');
const btnOrdenarEmpleado = document.getElementById('ordenarEmpleado');

let ordenAscendente = true;

function filtrarDatos() {
    const texto = filtroTexto.value.toLowerCase();
    const tarjetas = document.querySelectorAll('.fromData');

    tarjetas.forEach(tarjeta => {
        const contenido = tarjeta.innerText.toLowerCase();
        tarjeta.style.display = contenido.includes(texto) ? '' : 'none';
    });
}

function ordenarPor(selectorIndex) {
    const tarjetas = Array.from(document.querySelectorAll('.fromData'));

    tarjetas.sort((a, b) => {
        const valorA = a.querySelectorAll('td')[selectorIndex].textContent.toLowerCase();
        const valorB = b.querySelectorAll('td')[selectorIndex].textContent.toLowerCase();

        return ordenAscendente ? valorA.localeCompare(valorB) : valorB.localeCompare(valorA);
    });

    tarjetas.forEach(t => contenedor.appendChild(t));
    ordenAscendente = !ordenAscendente;
}

function ordenarFecha() {
    const tarjetas = Array.from(document.querySelectorAll('.fromData'));

    tarjetas.sort((a, b) => {
        const fechaA = a.querySelector('h2:nth-child(2)').textContent.match(/(\d{2})\/(\d{2})\/(\d{4})/);
        const fechaB = b.querySelector('h2:nth-child(2)').textContent.match(/(\d{2})\/(\d{2})\/(\d{4})/);

        const dateA = new Date(`${fechaA[3]}-${fechaA[2]}-${fechaA[1]}`);
        const dateB = new Date(`${fechaB[3]}-${fechaB[2]}-${fechaB[1]}`);

        return ordenAscendente ? dateA - dateB : dateB - dateA;
    });

    tarjetas.forEach(t => contenedor.appendChild(t));
    ordenAscendente = !ordenAscendente;
}

filtroTexto.addEventListener('keyup', filtrarDatos);

btnLimpiar.addEventListener('click', () => {
    filtroTexto.value = '';
    filtrarDatos();
});


btnOrdenarParte.addEventListener('click', () => ordenarPor(0));
btnOrdenarCliente.addEventListener('click', () => ordenarPor(3));
btnOrdenarEquipo.addEventListener('click', () => ordenarPor(4));
btnOrdenarEmpleado.addEventListener('click', () => ordenarPor(5));
btnOrdenarFecha.addEventListener('click', ordenarFecha);


function filtrarDatos() {
    const texto = filtroTexto.value.toLowerCase();
    const tarjetas = document.querySelectorAll('.fromData');

    tarjetas.forEach(tarjeta => {
        const numeroParte = tarjeta.querySelector('h2').textContent.toLowerCase(); // 1º h2 = Nº Parte
        const fecha = tarjeta.querySelector('h2:nth-child(2)').textContent.toLowerCase();

        const coincide = numeroParte.includes(texto) || fecha.includes(texto);

        tarjeta.style.display = coincide ? '' : 'none';
    });
}

