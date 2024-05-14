function getTableRow(event) {
    var boton = event.target.closest('button[id]');
    if (boton !== null) {
        var id = boton.getAttribute('id');
        console.log('ID del botón:', id);
        
        // Llenar los campos de entrada con los datos de la fila
    document.getElementById('ID').value = fila.cells[0].textContent;
    document.getElementById('Origen').value = fila.cells[1].textContent;
    document.getElementById('Destin').value = fila.cells[2].textContent;
    document.getElementById('Distance').value = fila.cells[3].textContent;
    document.getElementById('Duration').value = fila.cells[4].textContent;
    document.getElementById('Price').value = fila.cells[5].textContent;
    } else {
        console.log('El elemento no existe');
    }
}