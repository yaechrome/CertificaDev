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

function jsBoolean($algo) {
    return $algo ? "true" : "false";
}

function htmlChecked($algo) {
    return $algo ? "checked" : "";
}

function htmlSelected($algo) {
    return $algo ? "selected" : "";
}

function htmlIsOn($algo) {
    return $algo ? "1" : "0";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../static/css/postulacion.css" type="text/css"/>
        <meta charset="UTF-8">
        <title>Editar Postulacion</title>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            window.onload = function () {
                var vm = new Vue({
                    el: '#sel',
                    data: {
                        estado: <?= jsBoolean(!$postulacion->getExperienciaProgramacion()) ?>,
                        años: <?= $postulacion->getCantidadAhos() ?>
                    },
                    methods: {
                        cambiar: function () {
                            this.estado = !this.estado;
                            if (this.estado) {
                                this.años = 0;
                            }
                        }
                    }
                });
            };
        </script>
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
                                        <form action="editarPostulacion.php?id=<?= $id ?>" method="POST">
                                            <div id="sel">

                                                <table>
                                                    <tbody>
                                                        <h2 class="big title black-text">ACTUALIZAR POSTULACION</h2>
                                                        <tr>
                                                            <td class="black-text">Rut</td>
                                                            <td><input type="text" name="txtRut" value="<?= $usuario->getRut() ?>" disabled="true"/></td>
                                                            <td class="black-text">Direccion</td>
                                                            <td><input type="text" name="txtDireccion" value="<?= $postulacion->getDireccion() ?>" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="black-text">Nombre</td>
                                                            <td><input type="text" name="txtNombre" value="<?= $usuario->getNombre() ?>" disabled="true" /></td>
                                                            <td class="black-text">Comuna</td>
                                                            <td><select name="cmbComuna">
                                                                    <?php
                                                                    include_once '../dao/ComunaDaoImp.php';
                                                                    foreach (ComunaDaoImp::listar() as $value) {
                                                                        ?>
                                                                        <option <?= htmlSelected($postulacion->getComuna() == $value) ?> value="<?= $value->getId() ?>"><?= $value->getDescripcion() ?></option>                                
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="black-text">Apellido Paterno</td>
                                                            <td><input type="text" name="txtApellidoPaterno" value="<?= $usuario->getApellidoPaterno() ?>" disabled="true"/></td>
                                                            <td class="black-text">Educacion</td>
                                                            <td><select name="cmbEducacion">
                                                                    <?php
                                                                    include_once '../dao/EducacionDaoImp.php';
                                                                    foreach (EducacionDaoImp::listar() as $value) {
                                                                        ?>
                                                                        <option <?= htmlSelected($postulacion->getEducacion() == $value) ?> value="<?= $value->getId() ?>"> <?php echo $value->getDescripcion(); ?></option>                                
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="black-text">Apellido Materno</td>
                                                            <td><input type="text" name="txtApellidoMaterno" value="<?= $usuario->getApellidoMaterno() ?>" disabled="true"/></td>
                                                            <td class="black-text">
                                                                Experiencia laboral en programacion
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" name="chkExperiencia" <?= htmlChecked($postulacion->getExperienciaProgramacion()) ?> v-on:Click="cambiar"/> 
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="black-text">Fecha Nacimiento</td>
                                                            <td><input type="Date" name="txtFechaNacimiento" value="<?= $postulacion->getFechaNacimiento() ?>" /></td>
                                                            <td class="black-text">
                                                                cantidad años 
                                                            </td>
                                                            <td>
                                                                <input type="number" name="txtAños" v-model="años" v-bind:disabled="estado"/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="black-text">Sexo</td>
                                                            <td>
                                                                M <input type="radio" name="Sexo" value="M" <?= htmlChecked($postulacion->getSexo() == "M") ?> />
                                                                F <input type="radio" name="Sexo" value="F" <?= htmlChecked($postulacion->getSexo() == "F") ?>/>
                                                            </td>
                                                            <td class="black-text">
                                                                Modalidad y curso al que postula
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="black-text">Telefono</td>
                                                            <td><input type="text" name="txtTelefono" value="<?= $postulacion->getTelefono() ?>" /></td>
                                                            <td class="black-text">Modalidad</td>
                                                            <td><select name="cmbModalidad">
                                                                    <option <?= htmlSelected($postulacion->getModalidad() == "Diurno") ?>>Diurno</option>
                                                                    <option <?= htmlSelected($postulacion->getModalidad() == "Vespertino") ?>>Vespertino</option>
                                                                </select></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="black-text">Email</td>
                                                            <td><input type="text" name="txtEmail" value="<?= $postulacion->getEmail() ?>" /></td>
                                                            <td class="black-text">Curso</td>
                                                            <td><select name="cmbCurso">
                                                                    <option <?= htmlSelected($postulacion->getCurso() == "Java") ?>>Java</option>
                                                                    <option <?= htmlSelected($postulacion->getCurso() == ".Net") ?>>.Net</option>
                                                                    <option <?= htmlSelected($postulacion->getCurso() == "Php") ?>>Php</option>
                                                                </select></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="Estado" value="Pendiente" <?= htmlChecked($postulacion->getEstado() == "Pendiente") ?>/>Pendiente</td>
                                                            <td><input type="radio" name="Estado" value="Rechazado" <?= htmlChecked($postulacion->getEstado() == "Rechazado") ?>/>Rechazar</td>
                                                            <td><input type="radio" name="Estado" value="Aprobado" <?= htmlChecked($postulacion->getEstado() == "Aprobado") ?>/>Aprobar</td>
                                                            <td><input type="submit" value="Actualizar" name="btnActualizar" /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>  
                                            </div>
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
