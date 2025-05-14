window.addEventListener("load", iniForm);

function iniForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    document.getElementById("parte").addEventListener("change", valiParte);
    document.getElementById("descripccion").addEventListener("blur", valiDescripcion);
    document.getElementById("tiempo").addEventListener("blur", valiTiempo);
    document.getElementById("imagen").addEventListener("change", valiImagen);
    document.getElementById("empleado").addEventListener("change", valiEmpleado);
}

function enviarForm(e) {
    let valid = true;
    
    
    valid &= valiParte();
    valid &= valiDescripcion();
    valid &= valiTiempo();
    valid &= valiImagen();
    valid &= valiEmpleado();

    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea registrar esta tarea?");
        if (!confirmar) {
            e.preventDefault();
        }
    }
}

function valiParte() {
    let parte = document.getElementById("parte");
    eliminError(parte);

    if (parte.selectedIndex === 0 || parte.value === "") {
        document.getElementById("errorcliente").innerHTML = "Debe seleccionar un parte válido.";
        error(parte);
        return false;
    } else {
        document.getElementById("errorcliente").innerHTML = "";
        validarOK(parte);
        return true;
    }
}

function valiDescripcion() {
    let desc = document.getElementById("descripccion");
    let valor = desc.value.trim();
    eliminError(desc);

    if (valor.length === 0 || valor.length > 250) {
        document.getElementById("errordescripccion").innerHTML = "Descripción requerida (máx. 250 caracteres).";
        error(desc);
        return false;
    } else {
        document.getElementById("errordescripccion").innerHTML = "";
        validarOK(desc);
        return true;
    }
}

function valiTiempo() {
    let tiempo = document.getElementById("tiempo");
    eliminError(tiempo);

    if (tiempo.value === "" || isNaN(tiempo.value) || tiempo.value <= 0) {
        document.getElementById("errortiempo").innerHTML = "Introduzca un tiempo válido en minutos.";
        error(tiempo);
        return false;
    } else {
        document.getElementById("errortiempo").innerHTML = "";
        validarOK(tiempo);
        return true;
    }
}

function valiImagen() {
    let imagen = document.getElementById("imagen");
    eliminError(imagen);

    if (imagen.files.length === 0) {
        document.getElementById("errorimagen").innerHTML = "Debe seleccionar una imagen.";
        error(imagen);
        return false;
    } else {
        document.getElementById("errorimagen").innerHTML = "";
        validarOK(imagen);
        return true;
    }
}

function valiEmpleado() {
    let emp = document.getElementById("empleado");
    eliminError(emp);

    if (emp.selectedIndex === 0 || emp.value === "") {
        document.getElementById("errorEmpleado").innerHTML = "Debe seleccionar un empleado.";
        error(emp);
        return false;
    } else {
        document.getElementById("errorEmpleado").innerHTML = "";
        validarOK(emp);
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
