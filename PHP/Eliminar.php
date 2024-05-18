<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar</title>
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

  <!-- Bootstrap core CSS -->
  <link href="../BOOTSTRAP/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/owl.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../CSS/alert.css">
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
  <!-- ***** Preloader End ***** -->
  <header class="header-area header-sticky">

    <nav class="main-nav">
      <!-- ***** Logo Start ***** -->
      <a href="#" onclick="HomePage()" class="logo">
        <h1 id="NameCompany">Brasilia</h1>
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
                <i class="fa-solid fa-trash"></i>
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
                            $query = "SELECT * FROM BusTransportInformation WHERE Compani = 'Brasilia'";
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
                                                 
                                            <button onclick="getTableRow(event)" type="button" class="btn btn-danger" id="' . $row['Id'] . '">
                                                <i class="fa-solid fa-eraser"></i>
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
      <center>
        <h2>Datos a Eliminar</h2>
        <p>Recuerda, si eliminas definitivamente algún registro, no podrás recuperarlo.</p>
      </center><br>
      <form action="Drop.php" method="post">

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="modal fade" id="modal-container-432069" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">
                        Eliminar oferta
                      </h5>
                      <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <span>¿Estás seguro de que quieres eliminar esa oferta? Recuerda que no podrás recuperarla. Si es
                        así, por favor te pido que rectifiques y, si es necesario, continúa.</span><span
                        class="mt-md block"></span>
                      <br />
                      <br />
                      <span>Además, por seguridad, necesito tu número de trabajador para saber quién eliminó la
                        oferta.</span>
                      <br><br>
                      <div class="form-group">
                        <label for="EmployeeCode">
                          Codigo del trabajador
                        </label>
                        <input type="number" class="form-control" id="EmployeeCode" placeholder=" xxxxxx " required />
                      </div>
                    </div>
                    <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" id="eliminarBtn">
                        Eliminar
                    </button>

                    <!-- Botón Cerrar Modal -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    </div>
                  </div>

                </div>

              </div>

            </div>
          </div>
        </div>

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
            <input type="text" class="form-control" id="Origen" name="Origen" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Destin">
              Destino
            </label>
            <input type="text" class="form-control" id="Destin" name="Destin" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Distance">
              Distansia
            </label>
            <input type="text" class="form-control" id="Distance" name="Distance" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Duration">
              Duracion
            </label>
            <input type="text" class="form-control" id="Duration" name="Duration" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Price">
              Presio
            </label>
            <input type="number" class="form-control" id="Price" name="Price" readonly>
          </div>
        </div>
        <br>





        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


        <center>
          <a id="modal-432069" href="#modal-container-432069" role="button" class="btn-enviar"
            data-toggle="modal">Eliminar</a>
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

        <script>
        function HomePage() {
            let currentUrl = document.URL;
            let urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            let companyParam = urlParams.get('Company');

            let newUrl = "Company.php?Company=" + companyParam;

            window.location.href = newUrl;
        }
    </script>
</body>

</html>