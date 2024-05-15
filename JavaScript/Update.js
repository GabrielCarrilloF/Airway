const select1 = document.getElementById('Origen');
const select2 = document.getElementById('Destin');

// Agregar un evento de cambio al primer select
select1.addEventListener('change', function() {
  // Obtener las opciones seleccionadas en el primer select
  const selectedOptions = Array.from(select1.selectedOptions);
  
  // Actualizar las opciones disponibles en el segundo select
  select2.innerHTML = '';
  for (let i = 0; i < select1.options.length; i++) {
    const option = select1.options[i];
    if (!selectedOptions.includes(option)) {
      const newOption = document.createElement('option');
      newOption.value = option.value;
      newOption.text = option.text;
      select2.add(newOption);
    }
  }
});

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
        scrollToSection();
      } else {
        FalseUpdate();
        console.log('La fila no existe o no tiene suficientes celdas');
      }
    } else {
        FalseUpdate();
      console.log('El elemento no es un botón');
    }
}
function scrollToSection() {
    // Obtener la referencia a la sección a la que deseas desplazarte
    var section = document.getElementById('Update');
    
    // Desplazarse suavemente a la sección
    section.scrollIntoView({ behavior: 'smooth' });
}

function scrollToHead() {
    // Obtener la referencia a la sección a la que deseas desplazarte
    var section = document.getElementById('TableHead');
    
    // Desplazarse suavemente a la sección
    section.scrollIntoView({ behavior: 'smooth' });
}

function FalseUpdate(){
    scrollToHead();
    // Para ocultar el div con id "Update"
    document.getElementById('Update').style.display = 'none';
}

function TrueUpdate(){
    // Para ocultar el div con id "Update"
    document.getElementById('Update').style.display = 'block';
}

