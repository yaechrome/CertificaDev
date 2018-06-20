<?php

include_once '../dao/PostulacionDaoImp.php';

$dao = new PostulacionDaoImp();
$id = $_GET['id'];


if ($dao->eliminar($id)) {
    echo "<script> alert('Postulacion eliminada con exito') </script>";
} else {
    echo "<script> alert('Error al eliminar') </script>";
}

include_once '../paginas/ventanaBuscarSolicitud.php';
