// Obtener referencias a los elementos select
const select1 = document.getElementById('City1');
const select2 = document.getElementById('City2');

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

// Obtener el campo de entrada de texto y la etiqueta de aviso
const distanciaInput = document.getElementById('Distance');
const avisoElement = document.getElementById('Error');

// Agregar un evento de cambio al campo de entrada
distanciaInput.addEventListener('input', function() {
  let valor = distanciaInput.value;

  // Expresión regular para validar el formato deseado
  let formatoValido = /^\d{1,5}(\,\d{0,5})?\s?km$/;

  if (formatoValido.test(valor)) {
      // Formatear el valor con el espacio y la unidad de medida "km"
      avisoElement.textContent = '';
  } else {
      avisoElement.textContent = 'El formato no es correcto. Debe ser "00 km" o "00,00 km".';
  }
});

// Obtener el campo de entrada de texto y la etiqueta de aviso
const Duration = document.getElementById('Duration');
const Error = document.getElementById('Error2');

// Agregar un evento de cambio al campo de entrada
Duration.addEventListener('input', function() {
  let valor = Duration.value;

  // Expresión regular para validar el formato deseado
  let formatoValido = /^\d{1,2}h\s\d{1,2}m$/;

  if (formatoValido.test(valor)) {
      // Formatear el valor con el espacio y la unidad de medida "h m"
      let partes = valor.split(' ');
      let horas = parseInt(partes[0]);
      let minutos = parseInt(partes[1]);

      if (isNaN(horas) || isNaN(minutos)) {
          Error.textContent = 'El formato no es correcto. Debe ser "0h 0m".';
      } else {
          Duration.value = horas + 'h ' + minutos + 'm';
          Error.textContent = '';
      }
  } else {
      Error.textContent = 'El formato no es correcto. Debe ser "0h 0m".';
  }
});

const NameOriginal = document.getElementById('NameCompany');
const NameCompany = document.getElementById('Company');

NameCompany.value = NameOriginal.textContent;

// Obtener los parámetros de la URL
const urlParams = new URLSearchParams(window.location.search);
        
// Verificar el valor del parámetro "success"
if (urlParams.get('success') === 'true') {
    alert("¡Datos guardados exitosamente!");
} else if (urlParams.get('success') === 'false') {
    alert("Error al guardar los datos. Inténtalo de nuevo.");
}