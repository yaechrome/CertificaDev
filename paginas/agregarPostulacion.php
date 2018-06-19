<?php
include_once '../dto/ComunaDto.php';
include_once '../dto/EducacionDto.php';
include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';

$userDao = new UsuarioDaoImp();
session_start();

$postDao = new PostulacionDaoImp();
$postulacion = new PostulacionDto();

if($_SESSION['perfil']=='Postulante'){
    $_SESSION['postulante'] = $_SESSION['usuario'];
    
    include_once './ventanaBuscarPorRut.php';
}else{
    

}




//$comunaDao = new ComunaDaoImp();
//$_POST["cmbComunas"];
//$_POST["cmbEducacion"];


//$direccion = trim($_POST["txDireccion"]);
//$comuna = trim($_POST["cmbComuna"]);
//$educacion = trim($_POST["cmbEducacion"]);
//$experiencia = trim($_POST["chkExperiencia"]);
//$fecha_nacimiento = trim($_POST["txtFechaNacimiento"]);
//$cantidad = trim($_POST["txtAhos"]);
//$sexo = trim($_POST["sexo"]);
//$email = trim($_POST["txtEmail"]);
//$curso = trim($_POST["cmbCurso"]);
//
////echo 'dir '.$direccion.' comuna '.$comuna.' $educacion '.$educacion.' experiencia '.$experiencia.' fecha nac '.$fecha_nacimiento
////        .' cantidad '.$cantidad.' sexo '.$sexo.' email '.$email.' curso '.$curso;
//include_once 'ventanaAgregarPostulacion.php';
