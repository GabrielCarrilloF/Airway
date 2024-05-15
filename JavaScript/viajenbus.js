var countries = ["Acacias", "Aguachica", "Apartadó", "Arauca", "Armenia", "Barbosa", "Barrancabermeja", "Barranquilla", "Bogotá", 
"Bosconia", "Bucaramanga", "Buenaventura", "Buga", "Cali", "Cartagena", "Caucasia", "Cereté", "Chiquinquirá", "Ciénaga", "Corozal", 
"Coveñas", "Cúcuta", "Duitama", "El Banco", "El Carmen de Bolívar", "El Socorro", "Espinal", "Florencia", "Fundación", "Fusagasugá", 
"Garzón", "Girardot", "Granada", "Guamal", "Honda", "Ibagué", "Ipiales", "La Apartada", "La Dorada", "La Plata", "Lorica", "Magangué", 
"Maicao", "Manizales", "Medellín", "Melgar", "Mocoa", "Mompox", "Montería", "Neiva", "Ocaña", "Paipa", "Palmira", "Pamplona", "Pasto", 
"Pereira", "Pitalito", "Planeta Rica", "Plato", "Popayán", "Puerto Berrío", "Puerto Boyacá", "Quibdó", "Riohacha", "Sahagún", "Salento", 
"San Gil", "San Onofre", "Santa Marta", "Sincelejo", "Sogamoso", "Toluviejo", "Tuluá", "Tunja", "Turbo", "Valledupar", "Villavicencio", "Yopal"];

document.addEventListener("DOMContentLoaded", function() {
    var inputOrigen = document.getElementById("myInputOrigenbus");
    var inputDestino = document.getElementById("myInputDestinobus");
    var autocompleteListOrigen = document.getElementById("autocomplete-listOrigenbus");
    var autocompleteListDestino = document.getElementById("autocomplete-listDestinobus");

    inputOrigen.addEventListener("input", function() {
        autocompleteOrigen(inputOrigen.value.toLowerCase(), autocompleteListOrigen);
    });

    inputDestino.addEventListener("input", function() {
        autocompleteDestino(inputDestino.value.toLowerCase(), autocompleteListDestino);
    });

    document.addEventListener("click", function(event) {
        if (event.target !== inputOrigen && event.target !== inputDestino) {
            autocompleteListOrigen.innerHTML = "";
            autocompleteListDestino.innerHTML = "";
        }
    });

    function autocompleteOrigen(inputValue, listElement) {
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
                inputOrigen.value = match;
                listElement.innerHTML = "";
            });
            listElement.appendChild(option);
        });

        listElement.style.display = matches.length > 0 ? "block" : "none";
    }

    function autocompleteDestino(inputValue, listElement) {
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
                inputDestino.value = match;
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
    idaYVueltaBtn.classList.add('seleccionado');
    soloIdaBtn.classList.remove('seleccionado');
    fechaRegresoInput.disabled = false;
});

soloIdaBtn.addEventListener('click', function() {
    soloIdaBtn.classList.add('seleccionado');
    idaYVueltaBtn.classList.remove('seleccionado');
    fechaRegresoInput.disabled = true;
});
