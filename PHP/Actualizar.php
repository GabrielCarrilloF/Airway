<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actulizar</title>
  <link rel="stylesheet" href="../CSS/actualizar.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/alert.css">
     <!-- Bootstrap core CSS -->
  <link href="../BOOTSTRAP/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="../BOOTSTRAP/assets/css/fontawesome.css">
<link rel="stylesheet" href="../BOOTSTRAP/assets/css/templatemo-villa-agency.css">
<link rel="stylesheet" href="../BOOTSTRAP/assets/css/owl.css">
<link rel="stylesheet" href="../BOOTSTRAP/assets/css/animate.css">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <?php

    $connection_obj = mysqli_connect("localhost", "root", "", "Airway");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

$Name = ""; // Inicializar $Name para evitar errores si no se encuentra ningún resultado

$N = "SELECT UName FROM TemporalCompany";
// Ejecutar la consulta SELECT
$result1 = mysqli_query($connection_obj, $N) or die(mysqli_error($connection_obj));

// Verificar si hay resultados
if (mysqli_num_rows($result1) > 0) {
    // Obtener la primera fila de resultados
    $row = mysqli_fetch_assoc($result1);
    
    // Verificar si la columna UName existe en la fila
    if (isset($row['UName'])) {
        $Name = $row['UName'];
        // Utilizar el valor de $Name según tus necesidades
    } else {
        echo "La columna UName no está definida en los resultados.";
    }
} else {
    echo "No se encontraron resultados en TemporalCompany.";
}


// Consulta SQL para obtener los códigos de las ciudades
$query = "SELECT * FROM CompanyBus WHERE NameCompany = '$Name'";

// Ejecutar la consulta SELECT
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$log = $row['Logo'];
// close the db connection
mysqli_close($connection_obj);
  ?>


  <script>
        function HomePage() {
            let currentUrl = document.URL;
            let urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            let companyParam = urlParams.get('Company');

            let newUrl = "Company.php";

            window.location.href = newUrl;
        }
    </script>
  <!-- ***** Preloader End ***** -->
<header class="header-area header-sticky">
    
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="#" onclick="HomePage()" class="logo">
              <h1 id="NameCompany"><?php echo $Name; ?></h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="#" onclick="actualizarPagina()">Actulizar</a></li>
              <li><a href="#" onclick="HomePage()">Home</a></li>
            </ul>

          </nav>
        
  </header>
<br>

  <div class="container-fluid" id="TableHead">
    <div class="row">
      <div class="col-md-12">
        <table id="Table" class="table table-bordered table-sm">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                Destino
              </th>
              <th>
                Origen
              </th>
              <th>
                Distansia 
              </th>
              <th>
                Duracion
              </th>
              <th>
                Presion
              </th>
              <th>
                <i class="fa-solid fa-file-pen"></i>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
                            $connection_obj = mysqli_connect("localhost", "root", "", "Airway");
                            if (!$connection_obj) {
                                echo "Error No: " . mysqli_connect_errno();
                                echo "Error Description: " . mysqli_connect_error();
                                exit;
                            }
                            // Consulta SQL para obtener los códigos de las ciudades
                            $query = "SELECT * FROM BusTransportInformation WHERE Compani = '$Name'";
                            // Ejecutar la consulta SELECT
                            $result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

                            // Recorrer los resultados de la consulta
                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                              $query2 = "SELECT * FROM City WHERE CodeCity IN ('$row[CodeCity_Origen]', '$row[CodeCity_Destin]')";
                              // Ejecutar la consulta SELECT
                              $result2 = mysqli_query($connection_obj, $query2) or die(mysqli_error($connection_obj));

                              while ($row2 = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
                                  if ($row2['CodeCity'] == $row['CodeCity_Origen']) {
                                      $City_Origen = $row2['NameCity'];
                                  } elseif ($row2['CodeCity'] == $row['CodeCity_Destin']) {
                                      $City_Destin = $row2['NameCity'];
                                  }
                              }                             
                                echo '<tr class="table-success">
                                <td>
                                ' . $row['Id'] . '
                                </td>
                                <td>
                                ' . $City_Origen . '
                                </td>
                                <td>
                                ' . $City_Destin . '
                                </td>
                                <td>
                                ' . $row['Distance'] . '
                                </td>
                                <td>
                                ' . $row['duration_time'] . '
                                </td>
                                <td>
                                ' . $row['Price'] . '
                                </td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                 
                                            <button onclick="getTableRow(event)" type="button" class="btn btn-success" id="' . $row['Id'] . '">
        <i class="fa-regular fa-pen-to-square"></i>
      </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                            }
                            // close the db connection
                            mysqli_close($connection_obj);
                            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div id="Update" class="container my-5" style="display: none;">
      <center><h2>ACTUALIZAR</h2></center><br>
      <form action="Update.php" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="ID">
              Identificador de viaje
            </label>
            <input type="number" class="form-control" id="ID" name="ID" readonly>
          </div>
          <div class="col-md-6 mb-3">
          <label for="Origen">
              Origen
            </label>
          <select name="Origen" id="Origen" class="form-control" required>
                            
                            <option value="Acacias">Acacias</option>
                            <option value="Aguachica">Aguachica</option>
                            <option value="Apartadó">Apartadó</option>
                            <option value="Arauca">Arauca</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Barbosa">Barbosa</option>
                            <option value="Barrancabermeja">Barrancabermeja</option>
                            <option value="Barranquilla">Barranquilla</option>
                            <option value="Bogotá">Bogotá</option>
                            <option value="Bosconia">Bosconia</option>
                            <option value="Bucaramanga">Bucaramanga</option>
                            <option value="Buenaventura">Buenaventura</option>
                            <option value="Buga">Buga</option>
                            <option value="Cali">Cali</option>
                            <option value="Cartagena">Cartagena</option>
                            <option value="Caucasia">Caucasia</option>
                            <option value="Cereté">Cereté</option>
                            <option value="Chiquinquirá">Chiquinquirá</option>
                            <option value="Ciénaga">Ciénaga</option>
                            <option value="Corozal">Corozal</option>
                            <option value="Coveñas">Coveñas</option>
                            <option value="Cúcuta">Cúcuta</option>
                            <option value="Duitama">Duitama</option>
                            <option value="El Banco">El Banco</option>
                            <option value="El Carmen de Bolívar">El Carmen de Bolívar</option>
                            <option value="El Socorro">El Socorro</option>
                            <option value="Espinal">Espinal</option>
                            <option value="Florencia">Florencia</option>
                            <option value="Fundación">Fundación</option>
                            <option value="Fusagasugá">Fusagasugá</option>
                            <option value="Garzón">Garzón</option>
                            <option value="Girardot">Girardot</option>
                            <option value="Granada">Granada</option>
                            <option value="Guamal">Guamal</option>
                            <option value="Honda">Honda</option>
                            <option value="Ibagué">Ibagué</option>
                            <option value="Ipiales">Ipiales</option>
                            <option value="La Apartada">La Apartada</option>
                            <option value="La Dorada">La Dorada</option>
                            <option value="La Plata">La Plata</option>
                            <option value="Lorica">Lorica</option>
                            <option value="Magangué">Magangué</option>
                            <option value="Maicao">Maicao</option>
                            <option value="Manizales">Manizales</option>
                            <option value="Medellín">Medellín</option>
                            <option value="Melgar">Melgar</option>
                            <option value="Mocoa">Mocoa</option>
                            <option value="Mompox">Mompox</option>
                            <option value="Montería">Montería</option>
                            <option value="Neiva">Neiva</option>
                            <option value="Ocaña">Ocaña</option>
                            <option value="Paipa">Paipa</option>
                            <option value="Palmira">Palmira</option>
                            <option value="Pamplona">Pamplona</option>
                            <option value="Pasto">Pasto</option>
                            <option value="Pereira">Pereira</option>
                            <option value="Pitalito">Pitalito</option>
                            <option value="Planeta Rica">Planeta Rica</option>
                            <option value="Plato">Plato</option>
                            <option value="Popayán">Popayán</option>
                            <option value="Puerto Berrío">Puerto Berrío</option>
                            <option value="Puerto Boyacá">Puerto Boyacá</option>
                            <option value="Quibdó">Quibdó</option>
                            <option value="Riohacha">Riohacha</option>
                            <option value="Sahagún">Sahagún</option>
                            <option value="Salento">Salento</option>
                            <option value="San Gil">San Gil</option>
                            <option value="San Onofre">San Onofre</option>
                            <option value="Santa Marta">Santa Marta</option>
                            <option value="Sincelejo">Sincelejo</option>
                            <option value="Sogamoso">Sogamoso</option>
                            <option value="Toluviejo">Toluviejo</option>
                            <option value="Tuluá">Tuluá</option>
                            <option value="Tunja">Tunja</option>
                            <option value="Turbo">Turbo</option>
                            <option value="Valledupar">Valledupar</option>
                            <option value="Villavicencio">Villavicencio</option>
                            <option value="Yopal">Yopal</option>
                          </select>
            
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Destin">
              Destino
            </label>
            Destino: <select name="Destin" id="Destin" class="form-control" required>
                            
                            <option value="Acacias">Acacias</option>
                            <option value="Aguachica">Aguachica</option>
                            <option value="Apartadó">Apartadó</option>
                            <option value="Arauca">Arauca</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Barbosa">Barbosa</option>
                            <option value="Barrancabermeja">Barrancabermeja</option>
                            <option value="Barranquilla">Barranquilla</option>
                            <option value="Bogotá">Bogotá</option>
                            <option value="Bosconia">Bosconia</option>
                            <option value="Bucaramanga">Bucaramanga</option>
                            <option value="Buenaventura">Buenaventura</option>
                            <option value="Buga">Buga</option>
                            <option value="Cali">Cali</option>
                            <option value="Cartagena">Cartagena</option>
                            <option value="Caucasia">Caucasia</option>
                            <option value="Cereté">Cereté</option>
                            <option value="Chiquinquirá">Chiquinquirá</option>
                            <option value="Ciénaga">Ciénaga</option>
                            <option value="Corozal">Corozal</option>
                            <option value="Coveñas">Coveñas</option>
                            <option value="Cúcuta">Cúcuta</option>
                            <option value="Duitama">Duitama</option>
                            <option value="El Banco">El Banco</option>
                            <option value="El Carmen de Bolívar">El Carmen de Bolívar</option>
                            <option value="El Socorro">El Socorro</option>
                            <option value="Espinal">Espinal</option>
                            <option value="Florencia">Florencia</option>
                            <option value="Fundación">Fundación</option>
                            <option value="Fusagasugá">Fusagasugá</option>
                            <option value="Garzón">Garzón</option>
                            <option value="Girardot">Girardot</option>
                            <option value="Granada">Granada</option>
                            <option value="Guamal">Guamal</option>
                            <option value="Honda">Honda</option>
                            <option value="Ibagué">Ibagué</option>
                            <option value="Ipiales">Ipiales</option>
                            <option value="La Apartada">La Apartada</option>
                            <option value="La Dorada">La Dorada</option>
                            <option value="La Plata">La Plata</option>
                            <option value="Lorica">Lorica</option>
                            <option value="Magangué">Magangué</option>
                            <option value="Maicao">Maicao</option>
                            <option value="Manizales">Manizales</option>
                            <option value="Medellín">Medellín</option>
                            <option value="Melgar">Melgar</option>
                            <option value="Mocoa">Mocoa</option>
                            <option value="Mompox">Mompox</option>
                            <option value="Montería">Montería</option>
                            <option value="Neiva">Neiva</option>
                            <option value="Ocaña">Ocaña</option>
                            <option value="Paipa">Paipa</option>
                            <option value="Palmira">Palmira</option>
                            <option value="Pamplona">Pamplona</option>
                            <option value="Pasto">Pasto</option>
                            <option value="Pereira">Pereira</option>
                            <option value="Pitalito">Pitalito</option>
                            <option value="Planeta Rica">Planeta Rica</option>
                            <option value="Plato">Plato</option>
                            <option value="Popayán">Popayán</option>
                            <option value="Puerto Berrío">Puerto Berrío</option>
                            <option value="Puerto Boyacá">Puerto Boyacá</option>
                            <option value="Quibdó">Quibdó</option>
                            <option value="Riohacha">Riohacha</option>
                            <option value="Sahagún">Sahagún</option>
                            <option value="Salento">Salento</option>
                            <option value="San Gil">San Gil</option>
                            <option value="San Onofre">San Onofre</option>
                            <option value="Santa Marta">Santa Marta</option>
                            <option value="Sincelejo">Sincelejo</option>
                            <option value="Sogamoso">Sogamoso</option>
                            <option value="Toluviejo">Toluviejo</option>
                            <option value="Tuluá">Tuluá</option>
                            <option value="Tunja">Tunja</option>
                            <option value="Turbo">Turbo</option>
                            <option value="Valledupar">Valledupar</option>
                            <option value="Villavicencio">Villavicencio</option>
                            <option value="Yopal">Yopal</option>
                          </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Distance">
              Distansia
            </label>
            <input type="text" class="form-control" id="Distance" name="Distance">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Duration">
              Duracion
            </label>
            <input type="text" class="form-control" id="Duration" name="Duration">
          </div>
          <div class="col-md-6 mb-3">
            <label for="Price">
              Presio
            </label>
            <input type="number" class="form-control" id="Price" name="Price">
          </div>
        </div>
        <br>
       
      
    


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<center>
  <button type="submit" class="btn-enviar" id="openModal">Enviar</button>
  <button type="button" class="btn-enviar" onclick="FalseUpdate()">Canselar</button>


</center>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../JavaScript/alert.js"></script>
<script src="../JavaScript/actualizar.js"></script>



    <!--JS-->
    <script src="../JavaScript/Update.js"></script>
    <!-- Bootstrap core JavaScript -->
  <script src="../BOOTSTRAP/vendor/jquery/jquery.min.js"></script>
  <script src="../BOOTSTRAP/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/isotope.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/owl-carousel.js"></script>
  <script src="../BOOTSTRAP/assets/js/counter.js"></script>
  <script src="../BOOTSTRAP/assets/js/custom.js"></script>

</body>

</html>