function getTableRow(event) {
    var boton = event.target.closest('button[id]');
    if (boton !== null) {
      var id = boton.getAttribute('id');
      var fila = boton.closest('tr');
      
      if (fila !== null && fila.cells.length >= 6) {
        TrueUpdate();
        document.getElementById('ID').value = fila.cells[0].textContent.trim();
        document.getElementById('Origen').value = fila.cells[1].textContent.trim();
        document.getElementById('Destin').value = fila.cells[2].textContent.trim();
        document.getElementById('Distance').value = fila.cells[3].textContent.trim();
        document.getElementById('Duration').value = fila.cells[4].textContent.trim();
        document.getElementById('Price').value = fila.cells[5].textContent.trim();
      } else {
        FalseUpdate();
        console.log('La fila no existe o no tiene suficientes celdas');
      }
    } else {
        FalseUpdate();
      console.log('El elemento no es un botón');
    }
}

function FalseUpdate(){
    // Para ocultar el div con id "Update"
    document.getElementById('Update').style.display = 'none';
}

function TrueUpdate(){
    // Para ocultar el div con id "Update"
    document.getElementById('Update').style.display = 'block';
}