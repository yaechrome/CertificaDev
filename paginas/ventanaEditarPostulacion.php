<?php
include_once '../dto/UsuarioDto.php';
session_start();
$usuario = $_SESSION["usuario"];

$id = $_GET['id'];
include_once '../dao/PostulacionDaoImp.php';
$dao = new PostulacionDaoImp();
$postulacion = $dao->buscarPorClavePrimaria($id);

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
        <meta charset="UTF-8">
        <title>Editar Postulacion</title>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            window.onload = function () {
                var vm = new Vue({
                    el: '#sel',
                    data: {
                        estado: <?= jsBoolean(!$postulacion->getExperienciaProgramacion()) ?>
                    },
                    methods: {
                        cambiar: function () {
                            this.estado = !this.estado;
                        }
                    }
                });
            };
        </script>
    </head>
    <body>
        <form action="editarPostulacion.php?id=<?= $id ?>" method="POST">
            <div id="sel">

                <table>
                    <tbody>
                        <tr>
                            <td>Rut</td>
                            <td><input type="text" name="txtRut" value="<?= $usuario->getRut() ?>" disabled="true"/></td>
                            <td>Direccion</td>
                            <td><input type="text" name="txtDireccion" value="<?= $postulacion->getDireccion() ?>" /></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="txtNombre" value="<?= $usuario->getNombre() ?>" disabled="true" /></td>
                            <td>Comuna</td>
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
                            <td>Apellido Paterno</td>
                            <td><input type="text" name="txtApellidoPaterno" value="<?= $usuario->getApellidoPaterno() ?>" disabled="true"/></td>
                            <td>Educacion</td>
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
                            <td>Apellido Materno</td>
                            <td><input type="text" name="txtApellidoMaterno" value="<?= $usuario->getApellidoMaterno() ?>" disabled="true"/></td>
                            <td>
                                Experiencia laboral en programacion
                            </td>
                            <td>
                                <input type="checkbox" name="chkExperiencia" <?= htmlChecked($postulacion->getExperienciaProgramacion()) ?> value="" v-on:Click="cambiar"/> 
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Fecha Nacimiento</td>
                            <td><input type="Date" name="txtFechaNacimiento" value="<?= $postulacion->getFechaNacimiento() ?>" /></td>
                            <td>
                                cantidad años 
                            </td>
                            <td>
                                <input type="number" name="txtAños" value="<?= $postulacion->getCantidadAhos() ?>" v-bind:disabled="estado"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td>
                                M <input type="radio" name="Sexo" value="M" <?= htmlChecked($postulacion->getSexo() == "M") ?> />
                                F <input type="radio" name="Sexo" value="F" <?= htmlChecked($postulacion->getSexo() == "F") ?>/>
                            </td>
                            <td>
                                Modalidad y curso al que postula
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type="text" name="txtTelefono" value="<?= $postulacion->getTelefono() ?>" /></td>
                            <td>Modalidad</td>
                            <td><select name="cmbModalidad">
                                    <option <?= htmlSelected($postulacion->getModalidad() == "Diurno") ?>>Diurno</option>
                                    <option <?= htmlSelected($postulacion->getModalidad() == "Vespertino") ?>>Vespertino</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="txtEmail" value="<?= $postulacion->getEmail() ?>" /></td>
                            <td>Curso</td>
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
    </body>
</html>
