const filtroTexto = document.getElementById('filtroTexto');
const btnLimpiar = document.getElementById('btnLimpiarFiltros');
const btnOrdenar = document.getElementById('btnOrdenarNombres');
let ordenAscendente = true;

function filtrarDatos() {
    const texto = filtroTexto.value.toLowerCase();
    const tarjetas = document.querySelectorAll('.fromData');

    tarjetas.forEach(tarjeta => {
        const contenido = tarjeta.innerText.toLowerCase();
        const visible = contenido.includes(texto);
        tarjeta.style.display = visible ? '' : 'none';
    });
}

filtroTexto.addEventListener('keyup', filtrarDatos);

btnLimpiar.addEventListener('click', () => {
    filtroTexto.value = '';
    filtrarDatos();
});

btnOrdenar.addEventListener('click', ordenarNombres);
window.addEventListener('load', ordenarNombres);

function ordenarNombres() {
    const contenedor = document.getElementById('contenedorClientes');
    const tarjetas = Array.from(document.querySelectorAll('.fromData'));

    tarjetas.sort((a, b) => {
        const nombreA = a.querySelector('h2').textContent.toLowerCase();
        const nombreB = b.querySelector('h2').textContent.toLowerCase();

        return ordenAscendente ? nombreA.localeCompare(nombreB) : nombreB.localeCompare(nombreA);
    });

    tarjetas.forEach(t => contenedor.appendChild(t));

    ordenAscendente = !ordenAscendente;
    btnOrdenar.textContent = ordenAscendente ? 'Ordenar A-Z' : 'Ordenar Z-A';
}

window.addEventListener('load', filtrarDatos);
