window.addEventListener("DOMContentLoaded", function () {
    const parteSelect = document.getElementById("parte");
    const tareaSelect = document.getElementById("tarea");
    const todasTareas = Array.from(tareaSelect.options).slice(1); 

    tareaSelect.dataset.seleccionado = tareaSelect.value;

    function filtrarTareas() {
        const parteSeleccionada = parteSelect.value;

        tareaSelect.innerHTML = '<option value="">Seleccione Uno ...</option>';

        todasTareas.forEach(option => {
            if (option.dataset.parte === parteSeleccionada) {
                tareaSelect.appendChild(option.cloneNode(true));
            }
        });

        const tareaPrevia = tareaSelect.dataset.seleccionado;
        const seleccionada = tareaSelect.querySelector(`option[value="${tareaPrevia}"]`);
        if (seleccionada) seleccionada.selected = true;
    }

    filtrarTareas();
    parteSelect.addEventListener("change", filtrarTareas);
});window.addEventListener("DOMContentLoaded", function () {
    const parteSelect = document.getElementById("parte");
    const tareaSelect = document.getElementById("tarea");
    const todasTareas = Array.from(tareaSelect.options).slice(1); 

    tareaSelect.dataset.seleccionado = tareaSelect.value;

    function filtrarTareas() {
        const parteSeleccionada = parteSelect.value;

        tareaSelect.innerHTML = '<option value="">Seleccione Uno ...</option>';

        todasTareas.forEach(option => {
            if (option.dataset.parte === parteSeleccionada) {
                tareaSelect.appendChild(option.cloneNode(true));
            }
        });

        const tareaPrevia = tareaSelect.dataset.seleccionado;
        const seleccionada = tareaSelect.querySelector(`option[value="${tareaPrevia}"]`);
        if (seleccionada) seleccionada.selected = true;
    }

    filtrarTareas();
    parteSelect.addEventListener("change", filtrarTareas);
});