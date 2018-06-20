<?php
include_once '../dto/ComunaDto.php';
include_once '../dto/EducacionDto.php';
include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';

$comunaDao = new ComunaDaoImp();


$direccion = trim($_POST['txtDireccion']);
$comuna = trim($_POST['cmbComuna']);
$educacion = trim($_POST['cmbEducacion']);
$experiencia = trim($_POST['chkExperiencia']) != "";
$fechaNacimiento = trim($_POST['txtFechaNacimiento']);
$años = trim($_POST['txtAños']);
$sexo = trim($_POST['Sexo']);
$telefono = trim($_POST['txtTelefono']);
$modalidad = trim($_POST['cmbModalidad']);
$email = trim($_POST['txtEmail']);
$curso = trim($_POST['cmbCurso']);
$estado = trim($_POST['Estado']);

if($años==null){
    $años = 0;
}

$dao = new PostulacionDaoImp();
$id = $_GET['id'];
$dto = $dao->buscarPorClavePrimaria($id);

$dto->setDireccion($direccion);
$dto->setComuna($comuna);
$dto->setEducacion($educacion);
$dto->setExperienciaProgramacion($experiencia);
$dto->setFechaNacimiento($fechaNacimiento);
$dto->setCantidadAhos($años);
$dto->setSexo($sexo);
$dto->setTelefono($telefono);
$dto->setModalidad($modalidad);
$dto->setEmail($email);
$dto->setCurso($curso);
$dto->setEstado($estado);

$dao->modificar($dto);

include_once 'ventanaEditarPostulacion.php';