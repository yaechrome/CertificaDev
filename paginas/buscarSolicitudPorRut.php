<?php

include_once '../dao/PostulacionDaoImp.php';

$rut = $_POST["txtRut"];
$dao = new PostulacionDaoImp();
$lista = $dao->listarPorRut($rut);
session_start();
$_SESSION["listaDesplegar"]= $lista;

include_once 'ventanaBuscarSolicitud.php';
        

