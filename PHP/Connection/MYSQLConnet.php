<?php
// Conexión a la base de datos
$connection_obj = mysqli_connect("localhost", "root", "", "Airway");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

// Query para crear la vista
$query = "CREATE VIEW TemporalCompany AS SELECT * FROM Users WHERE UserName = '$UserName' AND PasswordManager = '$Password'";

// Ejecutar la consulta
if (mysqli_query($connection_obj, $query)) {
    $url = "../Company.php?";
    header("Location: $url");
} else {
    echo "Error al crear la vista: " . mysqli_error($connection_obj);
}

// Cerrar la conexión
mysqli_close($connection_obj);
?>