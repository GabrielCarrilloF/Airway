var countries = ["Argentina", "Brasil", "Chile", "Colombia", "Ecuador", "Perú", "Uruguay", "Venezuela"];

function autocomplete() {
    var input = document.getElementById("myInput");
    var autocompleteList = document.getElementById("autocomplete-list");

    // Limpiar la lista de autocompletado
    autocompleteList.innerHTML = "";

    // Obtener el valor del input
    var inputValue = input.value.toLowerCase();

    // Filtrar los elementos que coincidan con el valor del input
    var matches = countries.filter(function(country) {
        return country.toLowerCase().indexOf(inputValue) > -1;
    });

    // Mostrar los resultados en la lista de autocompletado
    matches.forEach(function(match) {
        var option = document.createElement("div");
        option.innerHTML = match;
        option.addEventListener("click", function() {
            input.value = match;
            autocompleteList.innerHTML = ""; // Limpiar la lista después de seleccionar una opción
        });
        autocompleteList.appendChild(option);
    });
}
