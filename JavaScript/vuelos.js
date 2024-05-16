var countries = ["Bogotá - El nuevo dorado", "Barranquilla", "Cali", "Cartagena", "Pereira", "Medellín", "Armenia", 
"Bucaramanga", "Araracuara", "Apartadó", "Arauca", "Bahía Solano", "Barrancabermeja", "Buenaventura", "Corozal", "Cúcuta", 
"Florencia", "Guapi", "Ibagué", "Ipiales", "La Chorrera", "Leticia", "La Macarena", "La Pedrera", "Puerto Leguizamo", 
"Manizales", "Mitú", "Neiva", "Nuquí", "Pasto", "Popayán", "Puerto Asís", "Puerto Carreño", "Puerto Inírida", "Providencia Isla", 
"Quibdó", "Riohacha", "Santa Marta", "San Andrés Isla", "San José de Guaviare", "San Vicente del Caguán", "Saravena", "Tarapacá", 
"Tame", "Tumaco", "Valledupar", "Villagarzón", "Villavicencio"];

document.addEventListener("DOMContentLoaded", function() {
    var input = document.getElementById("myInput");
    var autocompleteList = document.getElementById("autocomplete-list");

    input.addEventListener("input", function() {
        autocomplete(input.value.toLowerCase());
    });

    document.addEventListener("click", function(event) {
        if (event.target !== input) {
            autocompleteList.innerHTML = ""; // Limpiar la lista si se hace clic fuera del input
        }
    });
});

function autocomplete(inputValue) {
    var autocompleteList = document.getElementById("autocomplete-list");
    autocompleteList.innerHTML = ""; // Limpiar la lista de autocompletado

    if (inputValue.length === 0) {
        return; // No mostrar nada si el input está vacío
    }

    var matches = countries.filter(function(country) {
        return country.toLowerCase().includes(inputValue);
    });

    matches.forEach(function(match) {
        var option = document.createElement("div");
        option.textContent = match;
        option.addEventListener("click", function() {
            document.getElementById("myInput").value = match;
            autocompleteList.innerHTML = ""; // Limpiar la lista después de seleccionar una opción
        });
        autocompleteList.appendChild(option);
    });

    if (matches.length > 0) {
        autocompleteList.style.display = "block"; // Mostrar la lista de autocompletado si hay coincidencias
    } else {
        autocompleteList.style.display = "none"; // Ocultar la lista si no hay coincidencias
    }
}

/*--------------------*/
var countries = ["Bogotá - El nuevo dorado", "Barranquilla", "Cali", "Cartagena", "Pereira", "Medellín", "Armenia", 
"Bucaramanga", "Araracuara", "Apartadó", "Arauca", "Bahía Solano", "Barrancabermeja", "Buenaventura", "Corozal", "Cúcuta", 
"Florencia", "Guapi", "Ibagué", "Ipiales", "La Chorrera", "Leticia", "La Macarena", "La Pedrera", "Puerto Leguizamo", 
"Manizales", "Mitú", "Neiva", "Nuquí", "Pasto", "Popayán", "Puerto Asís", "Puerto Carreño", "Puerto Inírida", "Providencia Isla", 
"Quibdó", "Riohacha", "Santa Marta", "San Andrés Isla", "San José de Guaviare", "San Vicente del Caguán", "Saravena", "Tarapacá", 
"Tame", "Tumaco", "Valledupar", "Villagarzón", "Villavicencio"];

document.addEventListener("DOMContentLoaded", function() {
    var input = document.getElementById("myInput2");
    var autocompleteList = document.getElementById("autocomplete-list2");

    input.addEventListener("input", function() {
        autocomplete(input.value.toLowerCase());
    });

    document.addEventListener("click", function(event) {
        if (event.target !== input) {
            autocompleteList.innerHTML = ""; // Limpiar la lista si se hace clic fuera del input
        }
    });
});

function autocomplete(inputValue) {
    var autocompleteList = document.getElementById("autocomplete-list2");
    autocompleteList.innerHTML = ""; // Limpiar la lista de autocompletado

    if (inputValue.length === 0) {
        return; // No mostrar nada si el input está vacío
    }

    var matches = countries.filter(function(country) {
        return country.toLowerCase().includes(inputValue);
    });

    matches.forEach(function(match) {
        var option = document.createElement("div");
        option.textContent = match;
        option.addEventListener("click", function() {
            document.getElementById("myInput2").value = match;
            autocompleteList.innerHTML = ""; // Limpiar la lista después de seleccionar una opción
        });
        autocompleteList.appendChild(option);
    });

    if (matches.length > 0) {
        autocompleteList.style.display = "block"; // Mostrar la lista de autocompletado si hay coincidencias
    } else {
        autocompleteList.style.display = "none"; // Ocultar la lista si no hay coincidencias
    }
}

const idaYVueltaBtn = document.getElementById('idaYVueltaBtn');
const soloIdaBtn = document.getElementById('soloIdaBtn');
const fechaRegresoInput = document.getElementById('dater');

idaYVueltaBtn.addEventListener('click', function() {
  // Marcar el botón "Ida y vuelta" como seleccionado y desmarcar el botón "Solo ida"
  idaYVueltaBtn.classList.add('seleccionado');
  soloIdaBtn.classList.remove('seleccionado');
  // Habilitar el campo de fecha de regreso
  fechaRegresoInput.disabled = false;
});

soloIdaBtn.addEventListener('click', function() {
  // Marcar el botón "Solo ida" como seleccionado y desmarcar el botón "Ida y vuelta"
  soloIdaBtn.classList.add('seleccionado');
  idaYVueltaBtn.classList.remove('seleccionado');
  // Deshabilitar el campo de fecha de regreso
  fechaRegresoInput.disabled = true;
});


