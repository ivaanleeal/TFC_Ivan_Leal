window.addEventListener("load", function () {
    document.getElementById("enviar").addEventListener("click", validarLogin);

   
    document.getElementsByName("usuario")[0].addEventListener("input", validarUsuario);
    document.getElementsByName("password")[0].addEventListener("input", validarPassword);
});

function validarLogin(e) {
    let usuarioValido = validarUsuario();
    let passwordValido = validarPassword();

    if (!usuarioValido || !passwordValido) {
        e.preventDefault(); 
    }
}

function validarUsuario() {
    let usuario = document.getElementsByName("usuario")[0];
    let error = document.getElementById("errorUsu");

    eliminarErrores(usuario, error);

    let patron = /^[a-zA-Z0-9]{4,20}$/;

    if (!patron.test(usuario.value)) {
        error.textContent = "Nombre de usuario inválido (4-20 caracteres, solo letras y números)";
        marcarError(usuario, error);
        return false;
    }

    marcarValido(usuario);
    return true;
}

function validarPassword() {
    let password = document.getElementsByName("password")[0];
    let error = document.getElementById("errorPassw");

    eliminarErrores(password, error);

    if (password.value.length < 6) {
        error.textContent = "Contraseña muy corta (mínimo 6 caracteres)";
        marcarError(password, error);
        return false;
    }

    marcarValido(password);
    return true;
}


function marcarError(input, errorText) {
    input.classList.remove("validocaja");
    input.classList.add("errorcaja");
    errorText.classList.add("errortexto");
}


function marcarValido(input) {
    input.classList.remove("errorcaja");
    input.classList.add("validocaja");
}


function eliminarErrores(input, errorText) {
    input.classList.remove("errorcaja", "validocaja");
    errorText.classList.remove("errortexto");
    errorText.textContent = "";
}
