<?php

include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';

$userDao = new UsuarioDaoImp();
session_start();

$postDao = new PostulacionDaoImp();
$postulacion = new PostulacionDto();


if($_SESSION["perfil"]=="Postulante"){
    $_SESSION["postulante"] = $_SESSION["usuario"];
    
    include_once './ventanaAgregarPostulacion.php';
}else{
    
    echo 'hola';

}
