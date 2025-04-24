window.addEventListener("load", iniForm);

function iniForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    document.getElementById("dni").addEventListener("blur", valiDni);
    document.getElementById("nombre").addEventListener("blur", valiNombre);
    document.getElementById("apellidos").addEventListener("blur", valiApellido);


    document.getElementById("dni").addEventListener("input", valiDni);
    document.getElementById("nombre").addEventListener("input", valiNombre);
    document.getElementById("apellidos").addEventListener("input", valiApellido);
}

function enviarForm(e) {
    let valid =
        valiDni() &
        valiNombre() &
        valiApellido();

    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea registrar/guarda los cambios de este empleado?");
        if (!confirmar) {
            e.preventDefault();
        }
    }
}

function valiDni() {
    let dni = document.getElementById("dni");
    let patron = /^\d{8}[A-Z]$/;
    let resultado = dni.value.trim().match(patron);

    eliminError(dni);

    if (resultado == null) {
        document.getElementById("errordni").innerHTML = "DNI mal escrito (Ej: 12345678A)";
        error(document.getElementById("errordni"));
        error(dni);
        return false;
    } else {
        document.getElementById("errordni").innerHTML = "";
        validarOK(dni);
        return true;
    }
}

function valiNombre() {
    let nombre = document.getElementById("nombre");
    let patron = /^([A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)*$/;
    let resultado = nombre.value.trim().match(patron);

    eliminError(nombre);

    if (resultado == null) {
        document.getElementById("errornombre").innerHTML = "Nombre mal escrito";
        error(document.getElementById("errornombre"));
        error(nombre);
        return false;
    } else {
        document.getElementById("errornombre").innerHTML = "";
        validarOK(nombre);
        return true;
    }
}

function valiApellido() {
    let apellido = document.getElementById("apellidos");
    let patron = /^([A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)*$/;
    let resultado = apellido.value.trim().match(patron);

    eliminError(apellido);

    if (resultado == null) {
        document.getElementById("errorapellido").innerHTML = "Apellido mal escrito";
        error(document.getElementById("errorapellido"));
        error(apellido);
        return false;
    } else {
        document.getElementById("errorapellido").innerHTML = "";
        validarOK(apellido);
        return true;
    }
}

function eliminError(elemento) {
    elemento.classList.remove("errorcaja");
    elemento.classList.remove("errortexto");
    elemento.classList.remove("validocaja");
}

function error(elemento) {
    if (elemento.tagName === "INPUT" || elemento.tagName === "TEXTAREA") {
        elemento.classList.add("errorcaja");
    } else {
        elemento.classList.add("errortexto");
    }
}

function validarOK(elemento) {
    elemento.classList.add("validocaja");
}
