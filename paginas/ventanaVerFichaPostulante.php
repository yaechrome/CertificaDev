<?php
include_once '../dto/UsuarioDto.php';
include_once '../dto/ComunaDto.php';
include_once '../dto/EducacionDto.php';
session_start();
$usuario = $_SESSION["usuario"];

$id = $_GET['id'];
include_once '../dao/PostulacionDaoImp.php';
include_once '../dao/ComunaDaoImp.php';
include_once '../dao/EducacionDaoImp.php';
$daoComuna = new ComunaDaoImp();
$daoEducacion = new EducacionDaoImp();
$dao = new PostulacionDaoImp();
$postulacion = $dao->buscarPorClavePrimaria($id);
$comuna = $daoComuna->buscarPorClavePrimaria($postulacion->getComuna());
$educacion = $daoEducacion->buscarPorClavePrimaria($postulacion->getEducacion());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
                        <td><?= $comuna->getDescripcion() ?></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><?= $usuario->getApellidoMaterno() ?></td>
                        <td>Educacion</td>
                        <td><?= $educacion->getDescripcion() ?></td>
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
        <input type="submit" value="Volver" name="btnVolver" />
    </body>
</html>
