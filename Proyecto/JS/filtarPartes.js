window.addEventListener("DOMContentLoaded", function () {
    const clienteSelect = document.getElementById("cliente_telefono");
    const equipoSelect = document.getElementById("equipo");
    const todasOpciones = Array.from(equipoSelect.options).slice(1); 
    function filtrarEquipos() {
        const clienteTelefono = clienteSelect.value;
        const equipoActual = equipoSelect.dataset.seleccionado; 

        equipoSelect.innerHTML = '<option value="">Seleccione Uno ...</option>';

        todasOpciones.forEach(option => {
            if (option.dataset.cliente === clienteTelefono) {
                equipoSelect.appendChild(option.cloneNode(true));
            }
        });

        
        const selectedOption = equipoSelect.querySelector(`option[value="${equipoActual}"]`);
        if (selectedOption) selectedOption.selected = true;
    }

    
    equipoSelect.dataset.seleccionado = equipoSelect.value;

    filtrarEquipos(); 
    clienteSelect.addEventListener("change", filtrarEquipos);
});
