<?php
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

// Realizar la consulta y obtener el ID
$connection_obj = mysqli_connect("localhost", "root", "", "Airway");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}
// Consulta SQL para obtener los códigos de las ciudades
$query = "SELECT * FROM Users WHERE UserName = '$UserName' AND PasswordManager = '$Password'";

// Ejecutar la consulta SELECT
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$Id = $row['Id'];
$Name = $row['UName'];


if ($row['Tipe'] == "Compañia de Bus"){
    // Redireccionar
    $url = "Company.php?Company=" . urlencode($Name);
  header("Location: $url");
  exit();
    header('Location: Company.php');
    exit;
}
// close the db connection
mysqli_close($connection_obj);
?>
