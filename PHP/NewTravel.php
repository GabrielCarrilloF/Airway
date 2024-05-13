<?php
$connection_obj = mysqli_connect("localhost", "root", "", "Airway");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

$City1 = $_POST['City1'];
$City2 = $_POST['City2'];
$Distance = $_POST['Distance'];
$Duration = $_POST['Duration'];
$Price = $_POST['Price'];
$Company = $_POST['Company'];

if ($City1==$City2){
    // Redirigir a otro archivo HTML y mostrar un alert de NO éxito
    header("Location: Company.php.?success=false");
    exit();
}

// Consulta SQL para obtener los códigos de las ciudades
$query = "SELECT * FROM City WHERE NameCity IN ('$City1', '$City2')";
// Ejecutar la consulta SELECT
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

// Recorrer los resultados de la consulta
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    if ($row['NameCity'] == $City1) {
        $CodeCity_Origen = $row['CodeCity'];
    } elseif ($row['NameCity'] == $City2) {
        $CodeCity_Destin = $row['CodeCity'];
    }
}

// prepare the insert query
$query = "INSERT INTO BusTransportInformation(CodeCity_Origen,CodeCity_Destin,Distance,duration_time,Price,Compani)
VALUES ('". mysqli_real_escape_string($connection_obj, $CodeCity_Origen) ."','"
          . mysqli_real_escape_string($connection_obj, $CodeCity_Destin) ."','"
          . mysqli_real_escape_string($connection_obj, $Distance) ."','"
          . mysqli_real_escape_string($connection_obj, $Duration) ."','"
          . mysqli_real_escape_string($connection_obj, $Price) ."','"
          . mysqli_real_escape_string($connection_obj, $Company) ."')";
// run the insert query
$resul = mysqli_query($connection_obj, $query);

if ($resul) {
    // Redirigir a otro archivo HTML y mostrar un alert de éxito
    header("Location: Company.php.?success=true");
    exit();
} else {
    // Redirigir a otro archivo HTML y mostrar un alert de NO éxito
    header("Location: Company.php.?success=false");
    exit();
}

/*
// Consulta Las terminales 
$query = "SELECT * FROM Terminal WHERE CodeCity IN ('$CodeCity_Origen', '$CodeCity_Destino')";
// Ejecutar la consulta SELECT
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));
// Recorrer los resultados de la consulta
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    if ($row['CodeCity'] == $CodeCity_Origen) {
        $Terminal_Origen = $row['Name_Terminal'];
    } elseif ($row['CodeCity'] == $CodeCity_Destino) {
        $Terminal_Destino = $row['Name_Terminal'];
    }
}
*/

// close the db connection
mysqli_close($connection_obj);
?>    