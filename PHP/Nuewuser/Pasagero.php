<?php
    $connection_obj = mysqli_connect("localhost", "root", "", "Airway");
    if (!$connection_obj) {
        echo "Error No: " . mysqli_connect_errno();
        echo "Error Description: " . mysqli_connect_error();
        exit;
    }

    // Acceder a los valores enviados por el formulario
    $nombre = $_POST['nombreusuario'];
    $apellido = $_POST['apellidousuario'];
    $email = $_POST['emailusuario'];
    $confirmar = $_POST['confirmarusuario'];

    // Guardar el nombre y el apellido en una variable llamada nombreCompleto
    $nombreCompleto = $nombre . ' ' . $apellido;

    // Consulta SQL para insertar los datos en la tabla users
    $query = "INSERT INTO users (UName, UserName, Tipe, PasswordManager) VALUES ('$nombreCompleto', '$email', 'Pasajero', '$confirmar')";

    // Ejecutar la consulta INSERT
    $result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

    // Cerrar la conexión a la base de datos
    mysqli_close($connection_obj);
?>