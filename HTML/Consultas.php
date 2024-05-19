<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../CSS/Consult.css">
    <link rel="stylesheet" href="../CSS/ViagesStyles.css">
    <link href="../BOOTSTRAP/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/owl.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>
<body>
<?php
  $Origen = $_POST['origin'];
  $Destino = $_POST['destination'];
  $Fecha_Ida = $_POST['departure-date'];
  // Verificar si se envió el campo de fecha de regreso
if (isset($_POST['return-date']) && !empty($_POST['return-date'])) {
  // Se envió un valor para el campo de fecha de regreso, guárdalo en la variable
  $Fecha_Regreso = $_POST['return-date'];
} else {
  // No se envió un valor para el campo de fecha de regreso, asigna "No aplica" a la variable
  $Fecha_Regreso = "No aplica";
}

  $NPasajeros = $_POST['passengers'];

?>  

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
                  <li><progress class="progress" value="1" max="5"></progress></li>
                  <li><a>  <i class="fa-solid fa-cart-shopping"></i> Costo 0</a></li>
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
      <?php
  $connection_obj = mysqli_connect("localhost", "root", "", "Airway");
  if (!$connection_obj) {
      echo "Error No: " . mysqli_connect_errno();
      echo "Error Description: " . mysqli_connect_error();
      exit;
  }
  // Consulta SQL para obtener el código de la ciudad
$query = "SELECT CodeCity FROM city WHERE NameCity LIKE '%$Origen%' LIMIT 1";

// Ejecutar la consulta SELECT
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

// Verificar si se encontró una fila
if (mysqli_num_rows($result) > 0) {
    // Obtener la fila de resultados
    $row = mysqli_fetch_assoc($result);
    
    // Guardar el código de la ciudad en una variable
    $codigo_ciudadOrigen = $row['CodeCity'];
    // Consulta SQL para obtener el código de la ciudad
$query = "SELECT CodeCity FROM city WHERE NameCity LIKE '%$Destino%' LIMIT 1";

// Ejecutar la consulta SELECT
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

// Verificar si se encontró una fila
if (mysqli_num_rows($result) > 0) {
    // Obtener la fila de resultados
    $row = mysqli_fetch_assoc($result);
    
    // Guardar el código de la ciudad en una variable
    $codigo_ciudadDestino = $row['CodeCity'];

    $query = "SELECT * from bustransportinformation where CodeCity_Origen = '$codigo_ciudadOrigen' and CodeCity_Destin = '$codigo_ciudadDestino'";

    // Ejecutar la consulta SELECT
    $result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
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



      $price = $row['Price'];
      $formatted_price = number_format($price, 0, '.', '.');
      echo 
      '<div class="flight-card">
      <div class="flight-time">
          <span class="time">' . $hora_de_salida . '</span>
          <span class="airport">' . $row['CodeCity_Origen'] . '</span>
      </div>
      <div class="flight-details">
          <span class="direct">Directo</span>
          <span class="plane"><i class="fa-solid fa-van-shuttle fa-fade"></i></span>
          <span class="duration">' . $row['duration_time'] . '</span>
      </div>
      <div class="flight-time">
          <span class="time">' . $hora_de_llegada . '</span>
          <span class="airport">' . $row['CodeCity_Destin'] . '</span>
      </div>
      <div class="price">
          <span class="currency">COP</span>
          <span class="amount">' . $formatted_price . '</span>
          <span class="currency">Por persona</span>
      </div>
      <div class="price">
          <span class="amount"><a href="#" id="' . $row['Id'] . '">' . $row['Compani'] . '</a></span>
      </div>
    </div>';
    }
} else {
    // No se encontraron resultados, manejar el caso según sea necesario
    echo "No se encontraron resultados para la ciudad especificada.";
}
} else {
    // No se encontraron resultados, manejar el caso según sea necesario
    echo "No se encontraron resultados para la ciudad especificada.";
}


  // close the db connection
  mysqli_close($connection_obj);
?>
    <!-- Bootstrap core JavaScript -->
  <script src="../BOOTSTRAP/vendor/jquery/jquery.min.js"></script>
  <script src="../BOOTSTRAP/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/isotope.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/owl-carousel.js"></script>
  <script pt src="../BOOTSTRAP/assets/js/counter.js"></script>
  <script src="../BOOTSTRAP/assets/js/custom.js"></script>
</body>
</html>