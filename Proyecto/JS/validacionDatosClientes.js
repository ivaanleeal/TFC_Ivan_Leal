window.addEventListener("load", iniForm);

function iniForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    
    document.getElementById("telefono").addEventListener("blur", valiTelefono);
    document.getElementById("nombre").addEventListener("blur", valiNombre);
    document.getElementById("apellidos").addEventListener("blur", valiApellido);
    document.getElementById("usuario").addEventListener("blur", valiUsuario);
    document.getElementById("password").addEventListener("blur", valiPassword);

    
    document.getElementById("telefono").addEventListener("input", valiTelefono);
    document.getElementById("nombre").addEventListener("input", valiNombre);
    document.getElementById("apellidos").addEventListener("input", valiApellido);
    document.getElementById("usuario").addEventListener("input", valiUsuario);
    document.getElementById("password").addEventListener("input", valiPassword);
}

function enviarForm(e) {
    let valid =
        valiTelefono() &
        valiNombre() &
        valiApellido() &
        valiUsuario() &
        valiPassword();

    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea registrar/guardar este usuario?");
        if (!confirmar) {
            e.preventDefault();
        }
    }
}

function valiTelefono() {
    let telefono = document.getElementById("telefono");
    let patron = /^\d{9}$/;
    let resultado = telefono.value.match(patron);

    eliminError(telefono);

    if (resultado == null) {
        document.getElementById("errortelefono").innerHTML = "Número de teléfono inválido (9 dígitos)";
        error(document.getElementById("errortelefono"));
        error(telefono);
        return false;
    } else {
        document.getElementById("errortelefono").innerHTML = "";
        validarOK(telefono);
        return true;
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
    let apellido = document.getElementById("apellidos");
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

function valiUsuario() {
    let usuario = document.getElementById("usuario");

    eliminError(usuario);

    if (usuario.value.trim().length < 3) {
        document.getElementById("errorusuario").innerHTML = "Usuario muy corto (mínimo 3 caracteres)";
        error(document.getElementById("errorusuario"));
        error(usuario);
        return false;
    } else {
        document.getElementById("errorusuario").innerHTML = "";
        validarOK(usuario);
        return true;
    }
}

function valiPassword() {
    let password = document.getElementById("password");

    eliminError(password);

    if (password.value.trim().length < 6) {
        document.getElementById("errorpassword").innerHTML = "Contraseña muy débil (mínimo 6 caracteres)";
        error(document.getElementById("errorpassword"));
        error(password);
        return false;
    } else {
        document.getElementById("errorpassword").innerHTML = "";
        validarOK(password);
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
