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

if($rut== "" || $nombre== "" || $apellidoP== "" || $apellidoM== "" || $contrasena1== "" || $contrasena2== ""){
    
    $mensaje= "Debe ingresar todos los datos solicitados";
    
}else{
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
            }else{
                $mensaje= "Error al intentar registrar usuario";
            }
        }
    }
    
}
echo "<script> alert('$mensaje') </script>";
include_once 'ventanaAgregarUsuario.php';