<?php

include_once '../dao/PostulacionDaoImp.php';

$desde = $_POST["txtDesde"];
$hasta = $_POST["txtHasta"];
$dao = new PostulacionDaoImp();
$lista = $dao->buscarPorFecha($desde,$hasta);
session_start();
$_SESSION["listaDesplegar"]= $lista;

include_once 'ventanaBuscarSolicitud.php';