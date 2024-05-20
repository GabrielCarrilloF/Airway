<?php
// Recuperar los datos de la URL
$ID_etiqueta = $_GET['ID_etiqueta'];
$Origen = $_GET['Origen'];
$Destino = $_GET['Destino'];
$Fecha_Ida = $_GET['Fecha_Ida'];
$Fecha_Regreso = $_GET['Fecha_Regreso'];
$NPasajeros = $_GET['NPasajeros'];

$connection_obj = mysqli_connect("localhost", "root", "", "Airway");
  if (!$connection_obj) {
      echo "Error No: " . mysqli_connect_errno();
      echo "Error Description: " . mysqli_connect_error();
      exit;
  }
// Puedes trabajar con los datos aquí según sea necesario

$query = "SELECT * from bustransportinformation where Id = '$ID_etiqueta'";

    // Ejecutar la consulta SELECT
    $result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $price = $row['Price'];
    // Valor inicial
$formatted_price = number_format($price, 0, '.', '.');

// Convertir el valor formateado a un número
$price_number = intval(str_replace('.', '', $formatted_price)); // Elimina los puntos y convierte a entero

// Multiplicar por 2
$precio_doble = $price_number * $NPasajeros;

// Formatear el resultado nuevamente si es necesario
$formatted_double_price = number_format($precio_doble, 0, '.', '.');

// Hora de salida obtenida de la base de datos
$hora_salida = $row['CheckOutTime'];

// Duración del tiempo obtenida de la base de datos (en formato varchar)
$duracion_tiempo = $row['duration_time'];

// Parsear la duración del tiempo para obtener las horas y los minutos
list($horas, $minutos) = sscanf($duracion_tiempo, "%dh %dm");

// Convertir la hora de salida a objeto DateTime
$hora_salida_obj = new DateTime($hora_salida);

// Sumar la duración del tiempo a la hora de salida
$hora_salida_obj->add(new DateInterval("PT{$horas}H{$minutos}M"));

// Obtener la hora de llegada en formato de 12 horas
$hora_llegada_formato_12h = $hora_salida_obj->format('h:i A'); // 'h' para la hora en formato de 12 horas, 'i' para los minutos, 'A' para AM o PM

// Guardar la hora de llegada en la variable deseada
$hora_de_llegada = $hora_llegada_formato_12h;
// Hora de salida obtenida de la base de datos
$hora_salida = $row['CheckOutTime'];

// Convertir la hora de salida a objeto DateTime
$hora_salida_obj = new DateTime($hora_salida);

// Obtener la hora de salida en formato de 12 horas
$hora_salida_formato_12h = $hora_salida_obj->format('h:i A'); // 'h' para la hora en formato de 12 horas, 'i' para los minutos, 'A' para AM o PM

// Guardar la hora de salida en la variable deseada
$hora_de_salida = $hora_salida_formato_12h;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasagero</title>
    <link rel="stylesheet" href="../CSS/equipage.css">
    <link rel="stylesheet" href="../CSS/Consult.css">
    <link rel="stylesheet" href="../CSS/ViagesStyles.css">
    <link rel="stylesheet" href="../CSS/Pago.css">
    <link href="../BOOTSTRAP/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/owl.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>
<body>
<header class="header-area header-sticky">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="index.html" class="logo">
                  <h1>Airway</h1>
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li><a><i class="fa-solid fa-calendar-days"></i> <?php echo $Fecha_Ida; ?> </a></li>
                  <li><a><i class="fa-solid fa-user-plus"></i> <?php echo $NPasajeros; ?> </a></li>
                  <li><a> <i class="fa-solid fa-plane-departure fa-beat-fade"></i> <?php echo $Origen; ?> </a></li>
                  <li><a><i class="fa-solid fa-bus fa-beat-fade"></i></a></li>
                  <li><a><i class="fa-solid fa-plane-arrival fa-beat-fade"></i> <?php echo $Destino; ?> </a></li>
                  <li><progress class="progress" value="5" max="5"></progress></li>
                  <li><a><i class="fa-solid fa-cart-shopping"></i> $<?php echo $formatted_double_price; ?> </a></li>
                </ul>
                <a class='menu-trigger'>
                  <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
      </header>
      <h1>Pagar y confirmar reserva</h1>
      <p>Elige tu método de pago favorito.</p>
      <div class="container1">
        <div class="payment-section">
            <div class="payment-methods">
                <button class="payment-button active">Pago por PSE</button>
                <button class="payment-button">Rappi Pay</button>
                <button class="payment-button">Daviplata</button>
            </div>

            <div class="card-details">
                <h2>Datos de la tarjeta</h2>
                <div class="card-input">
                    <button id="openModalBtn" ><i class="fa-solid fa-plus fa-beat"></i></button>
                    <p>Ingresa tu tarjeta</p>
                </div>
                <div class="card-icons">
                    <img src="visa.png" alt="Visa">
                    <img src="mastercard.png" alt="MasterCard">
                    <img src="amex.png" alt="American Express">
                    <img src="diners.png" alt="Diners Club">
                    <img src="uatp.png" alt="UATP">
                </div>
            </div>
        </div>
        
        <div class="summary-section">
            <h2>Resumen de compra</h2>
            <div class="flight-info">
                <p><strong>Buese(s)</strong></p>
                <p><?php echo $Origen; ?> a <?php echo $Destino; ?></p>
                <strong><i class="fa-regular fa-calendar"></i> Fecha de ida: </strong><p><?php echo $Fecha_Ida; ?></p>
                <strong><i class="fa-regular fa-calendar"></i> Fecha de regreso: </strong><p><?php echo $Fecha_Regreso; ?></p>
                <p><strong><i class="fa-solid fa-clock"></i> <?php echo $hora_de_salida; ?></strong> - <strong><?php echo $hora_de_llegada; ?></strong></p>
                <p><strong><i class="fa-solid fa-users"></i> <?php echo $NPasajeros; ?> Peronas</strong></p>
                
            </div>
            <div class="total-payment">
                <p>Total a pagar</p>
                <p><strong>COP <?php echo $formatted_double_price; ?></strong></p>
            </div>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Ingresa tu tarjeta</h2>
            <p>Paga seguro con estos medios de pago</p>
            <div class="payment-icons">
                <img src="visa.png" alt="Visa">
                <img src="mastercard.png" alt="Mastercard">
                <img src="amex.png" alt="American Express">
                <img src="uatp.png" alt="UATP">
            </div>
            <form>
                <label for="cardName">Nombre del titular</label>
                <input type="text" id="cardName" name="cardName">
                
                <label for="cardNumber">Número de tarjeta</label>
                <input type="text" id="cardNumber" name="cardNumber">
                
                <div class="expiration-cvv">
                    <div>
                        <label for="expMonth">Mes</label>
                        <select id="expMonth" name="expMonth">
                            <!-- Opciones de meses -->
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div>
                        <label for="expYear">Año</label>
                        <select id="expYear" name="expYear">
                            <!-- Opciones de años -->
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>
                    </div>
                    <div>
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv">
                    </div>
                </div>
                <button type="button" class="cancel-btn">Volver</button>
                <button type="submit" class="submit-btn">Pagar</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("modal");
    var btn = document.getElementById("openModalBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "flex";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
    </script>
          <!-- Bootstrap core JavaScript -->
    <script src="../BOOTSTRAP/vendor/jquery/jquery.min.js"></script>
  <script src="../BOOTSTRAP/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/isotope.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/owl-carousel.js"></script>
  <script pt src="../BOOTSTRAP/assets/js/counter.js"></script>
  <script src="../BOOTSTRAP/assets/js/custom.js"></script>
</body>
</html>