<?php
// Conexión a la base de datos
$connection_obj = mysqli_connect("localhost", "root", "", "Airway");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

// Acceder a los valores enviados por el formulario
$nombre = $_POST['nombreusuario'];
$email = $_POST['emailusuario'];
$Correo = $_POST['email'];
$confirmar = $_POST['confirmarusuario'];


// Verifica si se ha enviado un archivo
if(isset($_FILES['Logo']) && $_FILES['Logo']['error'] === UPLOAD_ERR_OK) {
    $archivo_temporal = $_FILES['Logo']['tmp_name'];
    $nombre_archivo = $_FILES['Logo']['name'];
    
    // Ruta donde deseas mover el archivo
    $nueva_ruta = '../../Images/Companis-icon/' . $nombre_archivo;
    
    // Mueve el archivo a la nueva ubicación
    if(move_uploaded_file($archivo_temporal, $nueva_ruta)) {
        $nueva_ruta = str_replace('../../', '', $nueva_ruta);
        
// Consulta SQL para insertar los datos en la tabla users
$query = "INSERT INTO users (UName, UserName, Tipe, PasswordManager) VALUES ('$nombre', '$email', 'Compañia de Bus', '$confirmar')";
$result = mysqli_query($connection_obj, $query);
if (!$result) {
    die("Error en la consulta SQL: " . mysqli_error($connection_obj));
}

// Consulta SQL para insertar los datos en la tabla companybus
$query2 = "INSERT INTO companybus (NameCompany, Email, Logo) VALUES ('$nombre', '$Correo', '$nueva_ruta')";
$result2 = mysqli_query($connection_obj, $query2);
if (!$result2) {
    die("Error en la consulta SQL: " . mysqli_error($connection_obj));
}
    } else {
        echo "Hubo un error al mover el archivo.";
    }
} else {
    echo "No se ha cargado ningún archivo o ha ocurrido un error.";
}

// Cerrar la conexión a la base de datos
mysqli_close($connection_obj);
?>
