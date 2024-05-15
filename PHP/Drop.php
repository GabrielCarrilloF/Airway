<?php
$connection_obj = mysqli_connect("localhost", "root", "", "Airway");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

$Id = $_POST['ID'];

if ($Id == "") {
    // Redirigir a otro archivo HTML y mostrar un alert de NO éxito
    header("Location: Eliminar.php?success=false");
    exit();
}

// Consulta SQL para eliminar el registro con el ID proporcionado
$query = "DELETE FROM BusTransportInformation WHERE Id = $Id";
// Ejecutar la consulta DELETE
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

if ($result) {
    // Redirigir a otro archivo HTML y mostrar un alert de éxito
    header("Location: Eliminar.php?success=true");
    exit();
} else {
    // Redirigir a otro archivo HTML y mostrar un alert de NO éxito
    header("Location: Eliminar.php?success=false");
    exit();
}
?>
