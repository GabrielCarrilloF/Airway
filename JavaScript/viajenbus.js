var countries = ["Argentina", "Brasil", "Chile", "Colombia", "Ecuador", "Perú", "Uruguay", "Venezuela"];

document.addEventListener("DOMContentLoaded", function() {
    var inputOrigen = document.getElementById("myInputOrigenbus");
    var inputDestino = document.getElementById("myInputDestinobus");
    var autocompleteListOrigen = document.getElementById("autocomplete-listOrigenbus");
    var autocompleteListDestino = document.getElementById("autocomplete-listDestinobus");

    inputOrigen.addEventListener("input", function() {
        autocomplete(inputOrigen.value.toLowerCase(), autocompleteListOrigen);
    });

    inputDestino.addEventListener("input", function() {
        autocomplete(inputDestino.value.toLowerCase(), autocompleteListDestino);
    });

    document.addEventListener("click", function(event) {
        if (event.target !== inputOrigen && event.target !== inputDestino) {
            autocompleteListOrigen.innerHTML = "";
            autocompleteListDestino.innerHTML = "";
        }
    });

    function autocomplete(inputValue, listElement) {
        listElement.innerHTML = "";

        if (inputValue.length === 0) {
            return;
        }

        var matches = countries.filter(function(country) {
            return country.toLowerCase().includes(inputValue);
        });

        matches.forEach(function(match) {
            var option = document.createElement("div");
            option.textContent = match;
            option.addEventListener("click", function() {
                if (listElement === autocompleteListOrigen) {
                    inputOrigen.value = match;
                } else {
                    inputDestino.value = match;
                }
                listElement.innerHTML = "";
            });
            listElement.appendChild(option);
        });

        listElement.style.display = matches.length > 0 ? "block" : "none";
    }
});

const idaYVueltaBtn = document.getElementById('idaYVueltaBtnbus');
const soloIdaBtn = document.getElementById('soloIdaBtnbus');
const fechaRegresoInput = document.getElementById('daterbus');

idaYVueltaBtn.addEventListener('click', function() {
    idaYVueltaBtn.classList.add('seleccionadobus');
    soloIdaBtn.classList.remove('seleccionadobus');
    fechaRegresoInput.disabled = false;
});

soloIdaBtn.addEventListener('click', function() {
    soloIdaBtn.classList.add('seleccionadobus');
    idaYVueltaBtn.classList.remove('seleccionadobus');
    fechaRegresoInput.disabled = true;
});
