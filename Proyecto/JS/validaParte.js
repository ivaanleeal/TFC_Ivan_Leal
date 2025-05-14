window.addEventListener("load", iniForm);

function iniForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    document.getElementById("fecha").addEventListener("blur", valiFecha);
    document.getElementById("notas").addEventListener("blur", valiNotas);
    document.getElementById("seguimiento").addEventListener("blur", valiSeguimiento);

    document.getElementById("cliente_telefono").addEventListener("change", valiCliente);
    document.getElementById("equipo").addEventListener("change", valiEquipo);
    document.getElementById("empleado").addEventListener("change", valiEmpleado);
    document.querySelector("select[name='recogido']").addEventListener("change", valiRecogido);
}

function enviarForm(e) {
    let valid =
        valiFecha() &
        valiNotas() &
        valiSeguimiento() &
        valiRecogido() &
        valiCliente() &
        valiEquipo() &
        valiEmpleado();

    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea registrar este parte?");
        if (!confirmar) {
            e.preventDefault();
        }
    }
}

function valiFecha() {
    let fecha = document.getElementById("fecha");
    eliminError(fecha);
    let hoy = new Date().toISOString().split("T")[0];

    if (fecha.value === "" || fecha.value > hoy) {
        document.getElementById("errorfecha").innerHTML = "Fecha inválida o futura";
        error(document.getElementById("errorfecha"));
        error(fecha);
        return false;
    } else {
        document.getElementById("errorfecha").innerHTML = "";
        validarOK(fecha);
        return true;
    }
}

function valiNotas() {
    let notas = document.getElementById("notas");
    let valor = notas.value.trim();
    eliminError(notas);

    if (valor.length === 0 || valor.length > 250) {
        document.getElementById("errornotas").innerHTML = "Notas requeridas (máx. 250 caracteres)";
        error(document.getElementById("errornotas"));
        error(notas);
        return false;
    } else {
        document.getElementById("errornotas").innerHTML = "";
        validarOK(notas);
        return true;
    }
}

function valiSeguimiento() {
    let seguimiento = document.getElementById("seguimiento");
    let patron = /^[0-9]{6}[A-Z]{3}$/;
    eliminError(seguimiento);

    if (!seguimiento.value.match(patron)) {
        document.getElementById("errorseguimiento").innerHTML = "Debe contener 6 números y 3 letras Mayúsculas";
        error(document.getElementById("errorseguimiento"));
        error(seguimiento);
        return false;
    } else {
        document.getElementById("errorseguimiento").innerHTML = "";
        validarOK(seguimiento);
        return true;
    }
}

function valiRecogido() {
    let recogido = document.querySelector("select[name='recogido']");
    eliminError(recogido);

    if (recogido.selectedIndex === 0 || recogido.value === "") {
        document.getElementById("errorrecogido").innerHTML = "Debe seleccionar una opción";
        error(document.getElementById("errorrecogido"));
        error(recogido);
        return false;
    } else {
        document.getElementById("errorrecogido").innerHTML = "";
        validarOK(recogido);
        return true;
    }
}

function valiCliente() {
    let cliente = document.getElementById("cliente_telefono");
    eliminError(cliente);

    if (cliente.selectedIndex === 0 || cliente.value === "") {
        document.getElementById("errorcliente").innerHTML = "Debe seleccionar un cliente";
        error(document.getElementById("errorcliente"));
        error(cliente);
        return false;
    } else {
        document.getElementById("errorcliente").innerHTML = "";
        validarOK(cliente);
        return true;
    }
}

function valiEquipo() {
    let equipo = document.getElementById("equipo");
    eliminError(equipo);

    if (equipo.selectedIndex === 0 || equipo.value === "") {
        document.getElementById("errorEquipo").innerHTML = "Debe seleccionar un equipo";
        error(document.getElementById("errorEquipo"));
        error(equipo);
        return false;
    } else {
        document.getElementById("errorEquipo").innerHTML = "";
        validarOK(equipo);
        return true;
    }
}

function valiEmpleado() {
    let empleado = document.getElementById("empleado");
    eliminError(empleado);

    if (empleado.selectedIndex === 0 || empleado.value === "") {
        document.getElementById("errorEmpleado").innerHTML = "Debe seleccionar un empleado";
        error(document.getElementById("errorEmpleado"));
        error(empleado);
        return false;
    } else {
        document.getElementById("errorEmpleado").innerHTML = "";
        validarOK(empleado);
        return true;
    }
}


function eliminError(elemento) {
    elemento.classList.remove("errorcaja");
    elemento.classList.remove("errortexto");
    elemento.classList.remove("validocaja");
}

function error(elemento) {
    if (elemento.tagName === "INPUT" || elemento.tagName === "TEXTAREA" || elemento.tagName === "SELECT") {
        elemento.classList.add("errorcaja");
    } else {
        elemento.classList.add("errortexto");
    }
}

function validarOK(elemento) {
    elemento.classList.add("validocaja");
}
