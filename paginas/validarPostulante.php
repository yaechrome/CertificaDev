<?php

include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';

$userDao = new UsuarioDaoImp();
session_start();

$postDao = new PostulacionDaoImp();
$postulacion = new PostulacionDto();
$user = new UsuarioDto();

if($_SESSION["perfil"]=="Postulante"){
    $_SESSION["postulante"] = $_SESSION["usuario"];
    $user = $_SESSION["postulante"];
    $ultima = $postDao->BuscarUltimaSolicitud($user->getRut());
    if($ultima== null){
         include_once './ventanaAgregarPostulacion.php';
    }else{
        if($ultima->getEstado()== 'Pendiente'){
            echo "<script> alert('Ya existe una postulacion pendiente') </script>";
            include_once '../login/panel-control.php';
        }else{
            include_once './ventanaAgregarPostulacion.php';
        }
    }
}else{
    
    header("location:ventanaBuscarPostulante.php"); 

}
