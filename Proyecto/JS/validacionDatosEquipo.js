window.addEventListener("load", iniForm);

function iniForm() {
    document.getElementById("enviar").addEventListener("click", enviarForm);

    document.getElementById("marca").addEventListener("blur", valiMarca);
    document.getElementById("modelo").addEventListener("blur", valiModelo);
    document.getElementById("so").addEventListener("blur", valiSO);
    document.getElementById("cliente_telefono").addEventListener("blur", valiCliente);

    document.getElementById("marca").addEventListener("input", valiMarca);
    document.getElementById("modelo").addEventListener("input", valiModelo);
    document.getElementById("so").addEventListener("input", valiSO);
    document.getElementById("cliente_telefono").addEventListener("change", valiCliente);
}

function enviarForm(e) {
    let valid =
        valiMarca() &
        valiModelo() &
        valiSO() &
        valiCliente();

    if (!valid) {
        e.preventDefault();
    } else {
        let confirmar = confirm("¿Desea registrar este equipo?");
        if (!confirmar) {
            e.preventDefault();
        }
    }
}

function valiMarca() {
    let marca = document.getElementById("marca");
    let patron = /^[A-Za-z0-9\s\-]+$/;
    let resultado = marca.value.trim().match(patron);

    eliminError(marca);

    if (resultado == null || marca.value.trim().length === 0) {
        document.getElementById("errormarca").innerHTML = "Marca inválida (solo letras, números, espacios y guiones)";
        error(document.getElementById("errormarca"));
        error(marca);
        return false;
    } else {
        document.getElementById("errormarca").innerHTML = "";
        validarOK(marca);
        return true;
    }
}

function valiModelo() {
    let modelo = document.getElementById("modelo");
    let patron = /^[A-Za-z0-9\s\-]+$/;
    let resultado = modelo.value.trim().match(patron);

    eliminError(modelo);

    if (resultado == null || modelo.value.trim().length === 0) {
        document.getElementById("errormodelo").innerHTML = "Modelo inválido (solo letras, números, espacios y guiones)";
        error(document.getElementById("errormodelo"));
        error(modelo);
        return false;
    } else {
        document.getElementById("errormodelo").innerHTML = "";
        validarOK(modelo);
        return true;
    }
}

function valiSO() {
    let so = document.getElementById("so");
    let patron = /^[A-Za-z0-9\s\.]+$/;
    let resultado = so.value.trim().match(patron);

    eliminError(so);

    if (resultado == null || so.value.trim().length === 0 || so.value.trim().length > 9) {
        document.getElementById("errorso").innerHTML = "Sistema Operativo inválido (máx. 9 caracteres)";
        error(document.getElementById("errorso"));
        error(so);
        return false;
    } else {
        document.getElementById("errorso").innerHTML = "";
        validarOK(so);
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
