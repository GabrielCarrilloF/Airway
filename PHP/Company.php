<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Administrador de ofertas</title>
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
  <!-- Bootstrap core CSS -->
  <link href="../BOOTSTRAP/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/owl.css">
  <link rel="stylesheet" href="../BOOTSTRAP/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--CSS-->
  <link rel="stylesheet" href="../CSS/alert.css">
  <!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
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

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="../index.html" class="logo">
              <h1 id="NameCompany">Brasilia</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="../index.html">Salir</a></li>
            </ul>

          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb">Mis ofertas</span>
          <h3>Adminitra Tus ofertas</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section properties">
    <div class="container">
      <ul class="properties-filter">
        <li>
          <a class="is_active" href="#" data-filter="*">Ver todo</a>
        </li>
        <li>
          <a id="modal-394784" href="#modal-container-394784" role="button" class="btn" data-toggle="modal">Agregar</a>
        </li>
        <li>
          <a href="#">Actializar</a>
        </li>
        <li>
          <a href="#">Eliminar</a>
        </li>
        <li>
          <a href="#">Nuevo paquete</a>
        </li>
      </ul>
      <div class="row properties-box">
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
    echo '
    <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 rac adv">
        <div class="item">
            <a href="property-details.html"><img src="../Images/Companis-icon/Brasilia.png" alt=""></a>
            <span class="category">Brasilia</span>
            <h6>$' . $row['Price'] . '</h6>
            <h4><a href="property-details.html">De Cartagena a cali</a></h4>
            <ul>
                <li>Distancia: <span>' . $row['Distance'] . '</span></li>
                <li>Diracion: <span>' . $row['duration_time'] . '</span></li>
                <li>Salida: <span>' . $row['CodeCity_Origen'] . '</span></li>
                <li>Destino: <span>Cali</span></li>
            </ul>
        </div>
    </div>
';
}

// close the db connection
mysqli_close($connection_obj);
?>
      </div>
      <div class="row properties-box">
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 rac adv">
          <div class="item">
            <a href="property-details.html"><img src="../Images/Companis-icon/Brasilia.png" alt=""></a>
            <span class="category">Brasilia</span>
            <h6>$3.145.000</h6>
            <h4><a href="property-details.html">De Cartagena a cali</a></h4>
            <ul>
              <li>Distancia: <span>1 km</span></li>
              <li>Diracion: <span>2h 5m</span></li>
              <li>Salida: <span>Cartagena</span></li>
              <li>Destino: <span>Cali</span></li>
            </ul>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#">↑</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a id="modal-394784" href="#modal-container-394784" role="button" class="btn" data-toggle="modal">Launch demo
          modal</a>

        <div class="modal fade" id="modal-container-394784" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">
                  Agrega nievo viaje
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <form role="form" action="../PHP/NewTravel.php" method="post">
                        <div class="form-group">
                          <label for="EmployeeCode">
                            Codigo del trabajador
                          </label>
                          <input type="number" class="form-control" id="EmployeeCode" placeholder=" xxxxxx " required />
                        </div>
                        <div class="form-group">
                          Origen: <select name="City1" id="City1" class="form-control" required>
                            <option value="Acacias">Seleccione</option>
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

                        <div class="form-group">
                          Destino: <select name="City2" id="City2" class="form-control" required>
                            <option value="Acacias">Seleccione</option>
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
                        <div class="form-group">
                          <label for="Distance">
                            Distancia
                          </label>
                          <input type="text" class="form-control" name="Distance" id="Distance" placeholder="1.138 km">
                          <span id="Error"></span>
                        </div>
                        <div class="form-group">
                          <label for="Duration">
                            Diracion
                          </label>
                          <input type="text" class="form-control" name="Duration" id="Duration" placeholder="5h 30m">
                          <span id="Error2"></span>
                        </div>
                        <div class="form-group">
                          <label for="Price">
                            Presio en peso Colombiano
                          </label>
                          <input type="number" class="form-control" name="Price" id="Price"
                            placeholder="Presion sin punto" required>
                        </div>
                        <div class="form-group">
                          <label for="Company">
                            Empresa
                          </label>
                          <input type="text" class="form-control" name="Company" id="Company" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">
                          Guardar
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="myModal" class="modal-2">
    <div class="modal-content-2">
      <span class="close-2">&times;</span>
      <h4>¡FELICIDADES CACHON!</h4>
      <img src="../Images/chulito verde.gif" alt="Chulito animado">
      <p><b>MUY BIEN, TU TIQUETE FUE COMPRADO CON EXITO POR FIN TE VAS A LARGAR!</b></p>
      <button id="acceptModalBtn" class="acceptModalBtn">Aceptar</button>
    </div>
  </div>
  <div id="myotromodal" class="modal2-2">
    <div class="modal-content2-2">
      <span class="close2-2">&times;</span>
      <h4>¡LO SENTIMOS!</h4>
      <img src="../Images/x.gif" alt="x animada">
      <p><b>ALGO SALIÓ MAL, INTENTALO DE NUEVO!</b></p>
      <button id="acceptModalBtn2" class="acceptModalBtn">Cerrar</button>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved.

          Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a> Distribution: <a
            href="https://themewagon.com">ThemeWagon</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="../JavaScript/Company.js"></script>
  <script src="../JavaScript/alert.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="../BOOTSTRAP/vendor/jquery/jquery.min.js"></script>
  <script src="../BOOTSTRAP/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/isotope.min.js"></script>
  <script src="../BOOTSTRAP/assets/js/owl-carousel.js"></script>
  <script src="../BOOTSTRAP/assets/js/counter.js"></script>
  <script src="../BOOTSTRAP/assets/js/custom.js"></script>

</body>

</html>