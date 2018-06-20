<?php
include_once '../dto/UsuarioDto.php';

$postulante = $_SESSION["postulante"];

function htmlChecked($algo) {
    return $algo ? "checked" : "";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../static/css/postulacion.css" type="text/css"/>
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
                                        <form action="agregarPostulacion.php" method="POST">
                                            <div id='sel'>
                                                <table>
                                                    <tbody>
                                                    <h2 class="big title black-text">FORMULARIO DE POSTULACION</h2>
                                                    <tr>
                                                        <td class="black-text">Rut</td>
                                                        <td><input type="text" name="txtRut" value="<?= $postulante->getRut() ?>" disabled="true"/></td>
                                                        <td class="black-text">Direccion</td>
                                                        <td><input type="text" name="txtDireccion" required="true" value="" v-on:/></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="black-text">Nombre</td>
                                                        <td><input type="text" name="txtNombre" value="<?= $postulante->getNombre() ?>"  disabled="true"/></td>
                                                        <td class="black-text">Comuna</td>
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
                                                        <td class="black-text">Apellido Paterno</td>
                                                        <td><input type="text" name="txtApellidoPaterno" value="<?= $postulante->getApellidoPaterno() ?>" disabled="true"/></td>
                                                        <td class="black-text">Educacion</td>
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
                                                        <td class="black-text">Apellido Materno</td>
                                                        <td><input type="text" name="txtApellidoMaterno" value="<?= $postulante->getApellidoMaterno() ?>"  disabled="true"/></td>
                                                        <td class="black-text">
                                                            Experiencia laboral en  programacion
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="chkExperiencia" value="ON"  v-on:Click="cambiar"/> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="black-text">Fecha Nacimiento</td>
                                                        <td><input type="Date"  name="txtFechaNacimiento" value="" required="true" /></td>
                                                        <td class="black-text">
                                                            cantidad años 
                                                        </td>
                                                        <td>
                                                            <input type="number" name="txtAhos" v-model="años" v-bind:disabled="estado" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="black-text">Sexo</td>
                                                        <td>M<input type="radio" name="Sexo" value="M" checked="checked" /> 
                                                            F<input type="radio" name="Sexo" value="F" /></td>
                                                        <td class="black-text">
                                                            Modalidad y curso al que postula
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="black-text">Telefono</td>
                                                        <td><input type="text" name="txtTelefono" value="" required="true" /></td>
                                                        <td class="black-text">Modalidad</td>
                                                        <td><select name="cmbModalidad">
                                                                <option value="Diurno">Diurno</option>
                                                                <option value="Vespertino">Vespertino</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="black-text">Email</td>
                                                        <td><input type="text" name="txtEmail" value="" required="true"/></td>
                                                        <td class="black-text">Curso</td>
                                                        <td><select name="cmbCurso">
                                                                <option value="Java">Java</option>
                                                                <option value=".Net">.Net</option>
                                                                <option value="Php">Php</option>
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


