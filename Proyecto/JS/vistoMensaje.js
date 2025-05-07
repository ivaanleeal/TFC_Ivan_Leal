document.querySelectorAll('.checkbox-visto').forEach(cb => {
    cb.addEventListener('change', function (e) {
        e.preventDefault(); 
        e.stopPropagation(); 

        const id = this.dataset.id;
        const visto = this.checked ? 1 : 0;

        fetch(`index.php?c=mensaje&a=actualizarVisto`, {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `id=${id}&visto=${visto}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload(); 
            } else {
                alert("Error al actualizar estado.");
                this.checked = !this.checked; 
            }
        })
        .catch(err => {
            alert("Error de conexión.");
            this.checked = !this.checked;
        });
    });
});
