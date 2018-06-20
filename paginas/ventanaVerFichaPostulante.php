<?php
include_once '../dto/UsuarioDto.php';
session_start();


$id = $_GET['id'];
include_once '../dao/PostulacionDaoImp.php';
include_once '../dao/UsuarioDaoImp.php';
$daoUsuario = new UsuarioDaoImp();
$dao = new PostulacionDaoImp();
$postulacion = $dao->buscarPorClavePrimaria($id);
$usuario = $daoUsuario->buscarPorClavePrimaria($postulacion->getUsuario()->getRut());

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../static/css/codebeautify.css" type="text/css"/>
    <div class="text_right">
        <a class="btn red darken-1" href=../login/logout.php>Cerrar Sesion </a>
    </div>
    <title></title>
</head>
<body>
    <main role="main">
        <section class="container">
            <div class="row mb0 center-align relative full">
                <div class="center">
                    <div class="col s12 mb20">
                        <div class="card">
                            <div class="card-panel pad0">
                                <div class="card-content pad24">
                                    <h2 class="black-text">Ficha de Postulacion</h2>
                                    <br>
                                    <form action="verFichaPostulante.php" method="POST">
                                        <table class="table-of-contents" border="0">
                                            <tbody>
                                                <tr>
                                                    <td class="black-text">Rut:</td>
                                                    <td><?= $usuario->getRut() ?></td>
                                                    <td class="black-text">Email:</td>
                                                    <td><?= $postulacion->getEmail() ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="black-text">Nombre:</td>
                                                    <td><?= $usuario->getNombre() ?></td>
                                                    <td class="black-text">Direccion:</td>
                                                    <td><?= $postulacion->getDireccion() ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="black-text">Apellido Paterno:</td>
                                                    <td><?= $usuario->getApellidoPaterno() ?></td>
                                                    <td class="black-text">Comuna:</td>
                                                    <td><?= $postulacion->getComuna()->getDescripcion() ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="black-text">Apellido Materno:</td>
                                                    <td><?= $usuario->getApellidoMaterno() ?></td>
                                                    <td class="black-text">Educacion:</td>
                                                    <td><?= $postulacion->getEducacion()->getDescripcion() ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="black-text">Fecha Nacimiento:</td>
                                                    <td><?= $postulacion->getFechaNacimiento() ?></td>
                                                    <td class="black-text">Experiencia Laboral:</td>
                                                    <td><?= $postulacion->getCantidadAhos() ?> años</td>
                                                </tr>
                                                <tr>
                                                    <td class="black-text">Sexo:</td>
                                                    <td><?= $postulacion->getSexo() ?></td>
                                                    <td class="black-text">Modalidad:</td>
                                                    <td><?= $postulacion->getModalidad() ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="black-text">Telefono:</td>
                                                    <td><?= $postulacion->getTelefono() ?></td>
                                                    <td class="black-text">Curso:</td>
                                                    <td><?= $postulacion->getCurso() ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <br><br>
                                    <a href=../login/volver.php>Volver</a> <br>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
