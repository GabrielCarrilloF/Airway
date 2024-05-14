var countries = ["Argentina", "Brasil", "Chile", "Colombia", "Ecuador", "Perú", "Uruguay", "Venezuela"];

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
var countries = ["Argentina", "Brasil", "Chile", "Colombia", "Ecuador", "Perú", "Uruguay", "Venezuela"];

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