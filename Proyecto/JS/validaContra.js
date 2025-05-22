window.addEventListener("load", function () {
    document.querySelector("form").addEventListener("submit", validarLogin);
    document.getElementsByName("contrasena")[0].addEventListener("input", validarContrasena);
});

function validarLogin(e) {
    if (!validarContrasena()) {
        e.preventDefault(); 
    }
}

function validarContrasena() {
    const contrasena = document.getElementsByName("contrasena")[0];
    const error = document.getElementById("errorpassword");

    eliminarErrores(contrasena, error);
    if (contrasena.value.length < 6) {
        error.textContent = "Contraseña muy corta (mínimo 6 caracteres)";
        marcarError(contrasena, error);
        return false;
    }

    marcarValido(contrasena);
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
