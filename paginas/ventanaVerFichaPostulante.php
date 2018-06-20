<?php
include_once '../dto/UsuarioDto.php';

session_start();
$usuario = $_SESSION["usuario"];

$id = $_GET['id'];
include_once '../dao/PostulacionDaoImp.php';

$dao = new PostulacionDaoImp();
$postulacion = $dao->buscarPorClavePrimaria($id);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Ficha de Postulacion</h2>
        <form action="verFichaPostulante.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Rut</td>
                        <td><?= $usuario->getRut() ?></td>
                        <td>Email</td>
                        <td><?= $postulacion->getEmail() ?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?= $usuario->getNombre() ?></td>
                        <td>Direccion</td>
                        <td><?= $postulacion->getDireccion() ?></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno</td>
                        <td><?= $usuario->getApellidoPaterno() ?></td>
                        <td>Comuna</td>
                        <td><?= $postulacion->getComuna()->getDescripcion() ?></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><?= $usuario->getApellidoMaterno() ?></td>
                        <td>Educacion</td>
                        <td><?= $postulacion->getEducacion()->getDescripcion() ?></td>
                    </tr>
                    <tr>
                        <td>Fecha Nacimiento</td>
                        <td><?= $postulacion->getFechaNacimiento() ?></td>
                        <td>Experiencia Laboral</td>
                        <td><?= $postulacion->getCantidadAhos() ?> años</td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td><?= $postulacion->getSexo() ?></td>
                        <td>Modalidad</td>
                        <td><?= $postulacion->getModalidad() ?></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><?= $postulacion->getTelefono() ?></td>
                        <td>Curso</td>
                        <td><?= $postulacion->getCurso() ?></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <br><br>
        <a href=../login/volver.php>Volver</a> <br>
        <a href=../login/logout.php>Cerrar Sesion</a>
    </body>
</html>
