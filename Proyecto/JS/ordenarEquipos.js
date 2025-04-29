window.addEventListener("load", function () {
    const filtro = document.getElementById("filtroTexto");
    const contenedor = document.getElementById("contenedorEquipos");
    const tarjetas = contenedor.querySelectorAll(".fromData");

    filtro.addEventListener("input", function () {
        const texto = filtro.value.toLowerCase().trim();

        tarjetas.forEach(function (tarjeta) {
            const codigo = tarjeta.querySelector("h2").textContent.toLowerCase();

            if (codigo.includes(texto)) {
                tarjeta.style.display = "block";
            } else {
                tarjeta.style.display = "none";
            }
        });
    });

    document.getElementById("btnLimpiarFiltros").addEventListener("click", function () {
        filtro.value = "";
        tarjetas.forEach(function (tarjeta) {
            tarjeta.style.display = "block";
        });
    });
});
