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
$direccion = trim($_POST["txDireccion"]);
$comuna =trim($_POST["cmbComuna"]);


include_once 'ventanaAgregarPostulacion.php';
