<?php
$Type = $_POST['Type'];

if ($Type == "Pasajero" ){
    header('Location: ../HTML/registrarPasajero.html');
    exit;
}else if ($Type == "Compañía de Bus" ) {
    header('Location: ../HTML/RegistrarCompany.html');
    exit;
}else if ($Type == "Compañía de vuelos" ) {
    header('Location: ../HTML/RegistrarCompanyVuelos.html');
    exit;
}
?>