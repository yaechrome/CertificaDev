<?php

session_start();
include_once '../dao/PostulacionDaoImp.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';
include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';

$userDao = new UsuarioDaoImp();
$postDao = new PostulacionDaoImp();
$rut = trim($_POST["txtRut"]);
$postulacion = new PostulacionDto();
if($rut==""){
     echo "<script> alert('Debe ingresar un rut') </script>";
    include_once './ventanaBuscarPostulante.php';
}else{
    $user = $userDao->buscarPorClavePrimaria($rut);
    $_SESSION["postulante"] = $user;
    if($user==null){
        echo "<script> alert('RUT no pertenece a un usuario registrado') </script>";
        include_once './ventanaBuscarPostulante.php';
    }else{
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
    
    }
}