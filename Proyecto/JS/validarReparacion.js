window.addEventListener("load", initForm);

function initForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    document.getElementById("parte").addEventListener("blur", valiParte);
    document.getElementById("tarea").addEventListener("blur", valiTarea);
    document.getElementById("pieza").addEventListener("blur", valiPieza);
}

function enviarForm(e) {
    let valid = true;

    valid &= valiParte();
    valid &= valiTarea();
    valid &= valiPieza();

    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea registrar esta reparación?");
        if (!confirmar) {
            e.preventDefault();
        }
    }
}

function valiParte() {
    let parte = document.getElementById("parte");
    eliminError(parte);

    let valor = parte.value.trim();

    if (valor === "" || valor === "Seleccione Uno ...") {
        document.getElementById("errorParte").innerHTML = "Debe seleccionar un número de parte.";
        error(parte);
        return false;
    } else {
        document.getElementById("errorParte").innerHTML = "";
        validarOK(parte);
        return true;
    }
}

function valiTarea() {
    let tarea = document.getElementById("tarea");
    eliminError(tarea);

    let valor = tarea.value.trim();

    if (valor === "") {
        document.getElementById("errorTarea").innerHTML = "Debe seleccionar una tarea.";
        error(tarea);
        return false;
    } else {
        document.getElementById("errorTarea").innerHTML = "";
        validarOK(tarea);
        return true;
    }
}

function valiPieza() {
    let pieza = document.getElementById("pieza");
    eliminError(pieza);

    let valor = pieza.value.trim();

    if (valor === "" || valor === "Seleccione Uno ...") {
        document.getElementById("erroraPieza").innerHTML = "Debe seleccionar una pieza.";
        error(pieza);
        return false;
    } else {
        document.getElementById("erroraPieza").innerHTML = "";
        validarOK(pieza);
        return true;
    }
}

function eliminError(elemento) {
    elemento.classList.remove("errorcaja");
    elemento.classList.remove("errortexto");
    elemento.classList.remove("validocaja");
}

function error(elemento) {
    if (elemento.tagName === "SELECT") {
        elemento.classList.add("errorcaja");
    } else {
        elemento.classList.add("errortexto");
    }
}

function validarOK(elemento) {
    elemento.classList.add("validocaja");
}



document.addEventListener("DOMContentLoaded", function () {
    const parteSelect = document.getElementById("parte");
    const tareaSelect = document.getElementById("tarea");

    const allTareas = Array.from(tareaSelect.options);

    parteSelect.addEventListener("change", function () {
        const parteSeleccionado = this.value;

        tareaSelect.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione Uno ...';
        tareaSelect.appendChild(defaultOption);

        allTareas.forEach(option => {
            if (option.dataset.parte === parteSeleccionado) {
                tareaSelect.appendChild(option);
            }
        });
    });
});
