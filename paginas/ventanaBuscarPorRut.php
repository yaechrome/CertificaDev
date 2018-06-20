<?php
include_once '../dto/UsuarioDto.php';
session_start();
$usuario = $_SESSION["usuario"];
$rut = $usuario->getRut();

include_once '../dao/PostulacionDaoImp.php';
$dao = new PostulacionDaoImp();
$postulacion = $dao->BuscarUltimaSolicitud($rut);

if ($postulacion != null) {
    $estadoUltima = 'Estado de solicitud : ' . $postulacion->getEstado();

    if ($postulacion->getEstado() == 'Aprobado') {
        $estadoUltima += ' Dentro de un plazo máximo de 48 horas, uno de nuestros ejecutivos se pondrá en contacto con usted';
    } else if ($postulacion->getEstado() == 'Rechazado') {
        $estadoUltima += 'Para más información puede llamarnos al número que aparece en nuestra página oficial';
    }
} else {
    $estadoUltima = 'No existe ninguna solicitud registrada con ese rut';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <?= $estadoUltima ?>
        <br><br>
        <a href=../login/volver.php>Volver</a> <br>
        <a href=../login/logout.php>Cerrar Sesion</a>
    </body>
</html>
