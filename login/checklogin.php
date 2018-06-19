<?php
session_start();
?>

<?php

$host_db = "127.0.0.1";
$user_db = "root";
$pass_db = "";
$db_name = "certificadev";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM usuario WHERE rut = '$username' and contrasena = '$password'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 
 $row = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['usuario'] = $row;
    $_SESSION['perfil'] = $row['perfil'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apPaterno'] = $row['apellido_paterno'];
    $_SESSION['apMaterno'] = $row['apellido_materno'];
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    //echo "Bienvenido " . $_SESSION['nombre']." !";
    //echo "<br><br><a href=panel-control.php>Menu</a>"; 
    header("location:panel-control.php"); 
 } else { 
   echo "RUT o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>