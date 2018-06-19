<?php
session_start();
include_once '../dao/PostulacionDaoImp.php';

$dao = new PostulacionDaoImp();
$rut = $_POST["txtRut"];
if($_SESSION['perfil']=='Postulante'){
    
    $postulacion = 'hola';//$dao->BuscarUltimaSolicitud($rut);

    $_SESSION["postulacion"]= $postulacion;
    
    include_once './ventanaBuscarPorRut.php';
}else{
    

        $lista = $dao->listarPorRut($rut);

    $_SESSION["listaDesplegar"]= $lista;

    include_once 'ventanaBuscarSolicitud.php';
}

        

