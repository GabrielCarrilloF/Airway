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
                  <li><progress class="progress" value="2" max="5"></progress></li>
                  <li><a>  <i class="fa-solid fa-cart-shopping"></i> $<?php echo $formatted_double_price; ?> </a></li>
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
      <h2>Pasajeros</h2>
        <p>Ingresa el nombre y primer apellido (de cada pasajero) tal y como aparecen en el pasaporte o documento de identidad.</p>
      <div class="container1">
        <form>
            <div class="form-group">
                <label for="genero">Género*</label>
                <select id="genero" required>
                    <option value="" disabled selected>Seleccione</option>
                    <option value="male">Masculino</option>
                    <option value="female">Femenino</option>
                    <option value="other">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="primerNombre">Primer nombre*</label>
                <input type="text" id="primerNombre" required>
            </div>
            <div class="form-group">
                <label for="primerApellido">Primer apellido*</label>
                <input type="text" id="primerApellido" required>
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de nacimiento*</label>
                <input type="date" id="fechaNacimiento" required>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Nacionalidad*</label>
                <input type="text" id="nacionalidad" required>
            </div>
            <div class="form-group">
                <label for="viajeroFrecuente">Programa de viajero frecuente (opcional)</label>
                <select id="viajeroFrecuente">
                    <option value="noAplica">No aplica</option>
                    <!-- Additional options if necessary -->
                </select>
            </div>
        </form>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="../BOOTSTRAP/vendor/jquery/jquery.min.js"></script>
  <script src="../BOOTSTRAP/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/isotope.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/owl-carousel.js"></script>
  <script pt src="../BOOTSTRAP/assets/js/counter.js"></script>
  <script src="../BOOTSTRAP/assets/js/custom.js"></script>
</body>
</html>