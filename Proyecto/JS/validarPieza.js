window.addEventListener("load", initForm);

function initForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    document.getElementById("codigo_pieza").addEventListener("blur", valiCodigoPieza);
    document.getElementById("nombre").addEventListener("blur", valiNombre);
    document.getElementById("marca").addEventListener("blur", valiMarca);
    document.getElementById("modelo").addEventListener("blur", valiModelo);
}


function enviarForm(e) {
    let valid = true;
    
    valid &= valiCodigoPieza();
    valid &= valiNombre();
    valid &= valiMarca();
    valid &= valiModelo();

    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea registrar esta pieza?");
        if (!confirmar) {
            e.preventDefault();
        }
    }
}

function valiCodigoPieza() {
    let codigoPieza = document.getElementById("codigo_pieza");
    eliminError(codigoPieza);

    let valor = codigoPieza.value.trim();

    if (valor === "" || !/^[A-Za-z0-9]{6}$/.test(valor)) {
        document.getElementById("errorCodigo_pieza").innerHTML = "Debe ingresar un código de pieza válido (6 caracteres alfanuméricos).";
        error(codigoPieza);
        return false;
    } else {
        document.getElementById("errorCodigo_pieza").innerHTML = "";
        validarOK(codigoPieza);
        return true;
    }
}

function valiNombre() {
    let nombre = document.getElementById("nombre");
    let valor = nombre.value.trim();
    eliminError(nombre);

    if (valor.length === 0) {
        document.getElementById("errornombre").innerHTML = "El nombre de la pieza es obligatorio.";
        error(nombre);
        return false;
    } else {
        document.getElementById("errornombre").innerHTML = "";
        validarOK(nombre);
        return true;
    }
}

function valiMarca() {
    let marca = document.getElementById("marca");
    let valor = marca.value.trim();
    eliminError(marca);

    if (valor.length === 0) {
        document.getElementById("errorMarca").innerHTML = "La marca de la pieza es obligatoria.";
        error(marca);
        return false;
    } else {
        document.getElementById("errorMarca").innerHTML = "";
        validarOK(marca);
        return true;
    }
}

function valiModelo() {
    let modelo = document.getElementById("modelo");
    let valor = modelo.value.trim();
    eliminError(modelo);

    if (valor.length === 0) {
        document.getElementById("errorModelo").innerHTML = "El modelo de la pieza es obligatorio.";
        error(modelo);
        return false;
    } else {
        document.getElementById("errorModelo").innerHTML = "";
        validarOK(modelo);
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
