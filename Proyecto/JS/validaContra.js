window.addEventListener("load", function () {
    // Validación al enviar el formulario
    document.querySelector("form").addEventListener("submit", validarLogin);

    // Validación en tiempo real al escribir la contraseña
    document.getElementsByName("contrasena")[0].addEventListener("input", validarContrasena);
});

function validarLogin(e) {
    // Validar contraseña antes de enviar el formulario
    if (!validarContrasena()) {
        e.preventDefault(); // Detener el envío si hay error
    }
}

function validarContrasena() {
    const contrasena = document.getElementsByName("contrasena")[0];
    const error = document.getElementById("errorpassword");

    eliminarErrores(contrasena, error);

    // Validación: mínimo 6 caracteres
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
