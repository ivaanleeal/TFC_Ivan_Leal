window.addEventListener("load", iniForm);

function iniForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    // Validaciones en blur (al salir del campo)
    document.getElementById("nombre").addEventListener("blur", valiNombre);
    document.getElementById("apellido").addEventListener("blur", valiApellido);
    document.getElementById("email").addEventListener("blur", valiEmail);
    document.getElementById("mensaje").addEventListener("blur", valiTexto);

    // Validaciones en tiempo real (mientras escribe)
    document.getElementById("nombre").addEventListener("input", valiNombre);
    document.getElementById("apellido").addEventListener("input", valiApellido);
    document.getElementById("email").addEventListener("input", valiEmail);
    document.getElementById("mensaje").addEventListener("input", valiTexto);
}

function enviarForm(e) {
    let valid =
        valiNombre() &
        valiApellido() &
        valiEmail() &
        valiTexto();
    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea enviar el Formulario? Al enviarlo acepta nustra política de privacidad.");
        if (confirmar == true) {
            alert("Formulario enviado correctamente.");
            return valid;
        }else{
            e.preventDefault();
        }

    }


}

function valiNombre() {
    let nombre = document.getElementById("nombre");
    let patron = /^([A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)*$/;
    let resultado = nombre.value.match(patron);

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
    let apellido = document.getElementById("apellido");
    let patron = /^([A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)*$/;
    let resultado = apellido.value.match(patron);

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

function valiEmail() {
    let email = document.getElementById("email");
    let patron = /^[^@\s]+@[^@\s]+\.[a-z]{2,}$/i;
    let resultado = email.value.match(patron);

    eliminError(email);

    if (resultado == null) {
        document.getElementById("erroremail").innerHTML = "Email inválido";
        error(document.getElementById("erroremail"));
        error(email);
        return false;
    } else {
        document.getElementById("erroremail").innerHTML = "";
        validarOK(email);
        return true;
    }
}

function valiTexto() {
    let texto = document.getElementById("mensaje");

    eliminError(texto);

    if (texto.value.trim() === "") {
        document.getElementById("erroretexto").innerHTML = "Mensaje obligatorio";
        error(document.getElementById("erroretexto"));
        error(texto);
        return false;
    } else {
        document.getElementById("erroretexto").innerHTML = "";
        validarOK(texto);
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