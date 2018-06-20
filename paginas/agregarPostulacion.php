<?php
include_once '../dto/ComunaDto.php';
include_once '../dto/EducacionDto.php';
include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';

session_start();
$user = new UsuarioDto();
$userDao = new UsuarioDaoImp();
$postDao = new PostulacionDaoImp();
$postulacion = new PostulacionDto();

$user = $_SESSION["postulante"];

//print_r($_POST);
$direccion = trim($_POST['txtDireccion']);
$comuna = trim($_POST['cmbComuna']);
$educacion = trim($_POST['cmbEducacion']);
$experiencia = isset($_POST['chkExperiencia']) ? trim($_POST['chkExperiencia']) : "";
$fechaNacimiento = trim($_POST['txtFechaNacimiento']);
$años = isset($_POST['txtAhos']) ? trim($_POST['txtAhos']) : 0;
$sexo = trim($_POST['Sexo']);
$telefono = trim($_POST['txtTelefono']);
$modalidad = trim($_POST['cmbModalidad']);
$email = trim($_POST['txtEmail']);
$curso = trim($_POST['cmbCurso']);

if($años==null){
    $años = 0;
}

if($direccion == "" || $fechaNacimiento == "" ||  $telefono == "" || $email == ""){
    echo "<script> alert('Debe ingresar todos los datos') </script>";
}else{
    $postulacion->setDireccion($direccion);
    $postulacion->setUsuario($user);
    $postulacion->setComuna($comuna);
    $postulacion->setEducacion($educacion);
    $postulacion->setExperienciaProgramacion($experiencia);
    $postulacion->setFechaNacimiento($fechaNacimiento);
    $postulacion->setCantidadAhos($años);
    $postulacion->setSexo($sexo);
    $postulacion->setTelefono($telefono);
    $postulacion->setModalidad($modalidad);
    $postulacion->setEmail($email);
    $postulacion->setCurso($curso);

    if($postDao->agregar($postulacion)){
        echo "<script> alert('Postulacion ingresada con exito') </script>";
    }else{
        echo "<script> alert('Debe ingresar todos los datos') </script>";
    }
    include_once '../login/panel-control.php';
}

//echo 'dir '.$direccion.' comuna '.$comuna.' $educacion '.$educacion.' experiencia '.$experiencia.' fecha nac '.$fechaNacimiento
//        .' cantidad '.$años.' sexo '.$sexo.' email '.$email.' curso '.$curso;


