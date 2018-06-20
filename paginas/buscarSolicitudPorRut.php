<?php
session_start();
include_once '../dao/PostulacionDaoImp.php';
include_once '../dao/UsuarioDaoImp.php';
include_once '../dao/PostulacionDaoImp.php';
include_once '../dto/PostulacionDto.php';
include_once '../dto/UsuarioDto.php';

$dao = new PostulacionDaoImp();
$postulacion = new PostulacionDto();

$rut = trim($_POST["txtRut"]);
if($_SESSION['perfil']=='Postulante'){
    if($rut!=$_SESSION["username"]){
        $estadoUltima = 'Debe ingresar su RUT';
    }else{
        $postulacion = $dao->BuscarUltimaSolicitud($rut);
        IF($postulacion!=null){
            $estadoUltima = 'Estado de solicitud : '.$postulacion->getEstado();
            
            if($postulacion->getEstado() == 'Aprobado'){
                $estadoUltima += ' Dentro de un plazo máximo de 48 horas, uno de nuestros ejecutivos se pondrá en contacto con usted';
            }else if( $postulacion->getEstado() == 'Rechazado'){
                $estadoUltima += 'Para más información puede llamarnos al número que aparece en nuestra página oficial';    
            }
            
        }ELSE{
            $estadoUltima = 'No existe ninguna solicitud registrada con ese rut';
        }
    }
    $_SESSION["estadoUltima"]= $estadoUltima;
    include_once './ventanaBuscarPorRut.php';
}else{

        $lista = $dao->listarPorRut($rut);

    $_SESSION["listaDesplegar"]= $lista;

    include_once 'ventanaBuscarSolicitud.php';
}

        

