<?php
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImp.php';

$dao = new UsuarioDaoImp();
$rut = trim($_POST["txtRut"]);
$nombre = trim($_POST["txtNombre"]);
$apellidoP = trim($_POST["txtApellidoPaterno"]);
$apellidoM = trim($_POST["txtApellidoMaterno"]);
$contrasena1 = trim($_POST["txtContraseña1"]);
$contrasena2 = trim($_POST["txtContraseña2"]);
$mensaje = null;


    $buscar= $dao->existeRegistro($rut);
    if($buscar){
        $mensaje= "Usuario ya existe";
    }else{
        
        if($contrasena1!=$contrasena2){
            $mensaje= "Contraseña no coincide";
            
        }else{
            $usuario = new UsuarioDto();
            $usuario->setRut($rut);
            $usuario->setNombre($nombre);
            $usuario->setApellidoPaterno($apellidoP);
            $usuario->setApellidoMaterno($apellidoM);
            $usuario->setContrasena($contrasena1);
            
            if($dao->agregar($usuario)){
                $mensaje= "Usuario registrado con exito";
                echo "<script> alert('$mensaje') </script>";
            }else{
                $mensaje= "Error al intentar registrar usuario";
                echo "<script> alert('$mensaje') </script>";
            }
        }
    }
    


header("location:../login/Login.html"); 
include_once 'ventanaAgregarUsuario.php';