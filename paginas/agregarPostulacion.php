<?php
include_once '../dto/ComunaDto.php';
include_once '../dto/EducacionDto.php';
include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';

$comunaDao = new ComunaDaoImp();
$_POST["cmbComunas"];
$_POST["cmbEducacion"];
//$comunas = $comunaDao->listar();
//session_start();
//$_SESSION["listaComunas"]=$comunas;

include_once 'ventanaAgregarPostulacion.php';
