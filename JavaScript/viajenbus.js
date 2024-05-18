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
    var autocompleteOrigen = document.getElementById("autocomplete-origen");
    var autocompleteDestino = document.getElementById("autocomplete-destino");

    inputOrigen.addEventListener("input", function() {
        autocompleteInput(inputOrigen.value.toLowerCase(), autocompleteOrigen, inputOrigen);
    });

    inputDestino.addEventListener("input", function() {
        autocompleteInput(inputDestino.value.toLowerCase(), autocompleteDestino, inputDestino);
    });

    document.addEventListener("click", function(event) {
        if (event.target !== inputOrigen && event.target !== inputDestino) {
            autocompleteOrigen.innerHTML = "";
            autocompleteDestino.innerHTML = "";
        }
    });

    function autocompleteInput(inputValue, listElement, inputElement) {
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
                inputElement.value = match;
                listElement.innerHTML = "";
            });
            listElement.appendChild(option);
        });

        listElement.style.display = matches.length > 0 ? "block" : "none";
    }

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

    const fechaIdaInput = document.getElementById('datebus');

    fechaIdaInput.addEventListener('change', function() {
        const fechaHoy = new Date();
        const fechaIda = new Date(fechaIdaInput.value);
        const fechaRegreso = new Date(fechaRegresoInput.value);

        if (fechaIda < fechaHoy) {
            alert('La fecha de ida no puede ser anterior a la fecha de hoy.');
            fechaIdaInput.value = ''; // Restablecer el valor del campo de fecha de ida
        } else if (fechaRegreso < fechaHoy) {
            alert('La fecha de regreso no puede ser anterior a la fecha de hoy.');
            fechaRegresoInput.value = ''; // Restablecer el valor del campo de fecha de regreso
        } else if (fechaIda > fechaRegreso) {
            alert('La fecha de regreso no puede ser anterior a la fecha de ida.');
            fechaRegresoInput.value = ''; // Restablecer el valor del campo de fecha de regreso
        }
    });

    fechaRegresoInput.addEventListener('change', function() {
        const fechaHoy = new Date();
        const fechaIda = new Date(fechaIdaInput.value);
        const fechaRegreso = new Date(fechaRegresoInput.value);

        if (fechaIda < fechaHoy) {
            alert('La fecha de ida no puede ser anterior a la fecha de hoy.');
            fechaIdaInput.value = ''; // Restablecer el valor del campo de fecha de ida
        } else if (fechaRegreso < fechaHoy) {
            alert('La fecha de regreso no puede ser anterior a la fecha de hoy.');
            fechaRegresoInput.value = ''; // Restablecer el valor del campo de fecha de regreso
        } else if (fechaIda > fechaRegreso) {
            alert('La fecha de regreso no puede ser anterior a la fecha de ida.');
            fechaRegresoInput.value = ''; // Restablecer el valor del campo de fecha de regreso
        }
    });
});


