<?php
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';

$usuario = new UsuarioDto();
$dao = new UsuarioDaoImp();
$rut = trim($_POST["txtRut"]);
$nombre = trim($_POST["txtNombre"]);
$apellidoP = trim($_POST["txtApellidoPaterno"]);
$apellidoM = trim($_POST["txtApellidoMaterno"]);
$contraseña1 = trim($_POST["txtContraseña1"]);
$contraseña2 = trim($_POST["txtContraseña2"]);
$mensaje = null;

if(){
    
    $mensaje= "Debe ingresar todos los datos solicitados";
    
}else{
    $usuario= $dao->buscarPorClavePrimaria($rut);
    if($usuario != null){
        $mensaje= "Usuario ya existe";
    }else{
        
        if($contraseña1!=$contraseña2){
            $mensaje= "Contraseña no coincide";
        }else{
        
        }
    }
    
}

echo "<script> alert($mensaje) </script>";