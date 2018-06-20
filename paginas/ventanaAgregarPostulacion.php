<?php
include_once '../dto/UsuarioDto.php';

$postulante = $_SESSION["postulante"];

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
        <title>Crear Postulación</title>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            window.onload = function () {
                var vm = new Vue({
                    el: '#sel',
                    data: {
                        estado: true,
                        años: 0
                    },
                    methods: {
                        cambiar: function () {
                            this.estado = !this.estado;
                            if(this.estado){
                                this.años = 0;
                            }
                        }
                    }
                });
            };
        </script>
    </head>
    <body>
        <form action="agregarPostulacion.php" method="POST">
        <div id='sel'>
            <table border="0">
                <tbody>
                    
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" name="txtRut" value="<?= $postulante->getRut() ?>" disabled="true"/></td>
                        <td>Direccion</td>
                        <td><input type="text" name="txtDireccion" required="true" value="" v-on:/></td>
                    </tr>
                    
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="txtNombre" value="<?= $postulante->getNombre() ?>"  disabled="true"/></td>
                        <td>Comuna</td>
                        <td><select name="cmbComuna" >
                                <?php
                                    include_once '../dao/ComunaDaoImp.php';
                                    foreach (ComunaDaoImp::listar() as $value) {
                                        ?>
                                    <option value="<?= $value->getId() ?>"><?= $value->getDescripcion() ?></option>                                
                                    <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno</td>
                        <td><input type="text" name="txtApellidoPaterno" value="<?= $postulante->getApellidoPaterno() ?>" disabled="true"/></td>
                        <td>Educacion</td>
                        <td><select name="cmbEducacion">
                                 <?php
                                    include_once '../dao/EducacionDaoImp.php';
                                    foreach (EducacionDaoImp::listar() as $value) {
                                        ?>
                                    <option value="<?= $value->getId() ?>"> <?php echo $value->getDescripcion(); ?></option>                                
                                    <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><input type="text" name="txtApellidoMaterno" value="<?= $postulante->getApellidoMaterno() ?>"  disabled="true"/></td>
                        <td>
                            Experiencia laboral en  programacion
                        </td>
                        <td>
                            <input type="checkbox" name="chkExperiencia" value="ON"  v-on:Click="cambiar"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha Nacimiento</td>
                        <td><input type="Date"  name="txtFechaNacimiento" value="" required="true" /></td>
                        <td>
                            cantidad años 
                        </td>
                        <td>
                            <input type="number" name="txtAhos" v-model="años" v-bind:disabled="estado" />
                        </td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td>M<input type="radio" name="Sexo" value="M" checked="checked" /> 
                            F<input type="radio" name="Sexo" value="F" /></td>
                        <td>
                            Modalidad y curso al que postula
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input type="text" name="txtTelefono" value="" required="true" /></td>
                        <td>Modalidad</td>
                        <td><select name="cmbModalidad">
                                <option <?= htmlSelected($postulacion->getModalidad() == "Diurno") ?>>Diurno</option>
                                <option <?= htmlSelected($postulacion->getModalidad() == "Vespertino") ?>>Vespertino</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="txtEmail" value="" required="true"/></td>
                        <td>Curso</td>
                        <td><select name="cmbCurso">
                                <option <?= htmlSelected($postulacion->getCurso() == "Java") ?>>Java</option>
                                <option <?= htmlSelected($postulacion->getCurso() == ".Net") ?>>.Net</option>
                                <option <?= htmlSelected($postulacion->getCurso() == "Php") ?>>Php</option>
                            </select></td>
                    </tr>
                </tbody>
            </table>
            <br>            
            <input type="submit" value="Postular" name="btnPostular" />
        </div>
        </form>
        
        <br><br>
        <a href=../login/volver.php>Volver</a> <br>
        <a href=../login/logout.php>Cerrar Sesion</a>
    </body>
    
</html> 


