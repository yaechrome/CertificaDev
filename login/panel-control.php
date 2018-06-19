<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='login.html'>Login</a>";
   //echo "<br><br><a href='index.html'>Registrarme</a>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.html'>Necesita Hacer Login</a>";
exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Menu</title>
</head>

<body>
<h1>Menu</h1>


<ul>
    
  <?php 
    if($_SESSION['perfil']=='Postulante'){?>
    <p><a href="../paginas/validarPostulante.php" >Crear Postulacion</a></p>
  <p><a href="../paginas/ventanaBuscarPorRut.php" >Estado de Postulacion</a></p>


<?php
}else{
  ?>  
  <p><a href="../paginas/validarPostulante.php" >Crear Postulacion</a></p>
  <p><a href="../paginas/ventanaBuscarSolicitud.php" >Buscar Postulacion</a></p>

<?php
}
?>
</ul>



<br><br>
<a href=logout.php>Cerrar Sesion </a>
</body>
</html>
