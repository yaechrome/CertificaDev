<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="agregarPostulacion.php" method="POST">
            <div class="row">
                <div class="column">
                    <table border="0">
                        <tbody>
                            <tr>
                                <td>Rut</td>
                                <td><input type="text" name="txtRut" value="" /></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="txtNombre" value="" /></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno</td>
                                <td><input type="text" name="txtApellidoPaterno" value="" /></td>
                            </tr>
                            <tr>
                                <td>Apellido Materno</td>
                                <td><input type="text" name="txtApellidoMaterno" value="" /></td>
                            </tr>
                            <tr>
                                <td>Fecha Nacimiento</td>
                                <td><input type="Date" name="txtFechaNacimiento" value="" /></td>
                            </tr>
                            <tr>
                                <td>Sexo</td>
                                <td>M<input type="radio" name="Sexo" value="M" checked="checked" /> F<input type="radio" name="Sexo" value="F" /></td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td><input type="text" name="txtTelefono" value="" /></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="txtEmail" value="" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div  class="column">
                    <table border="0">
                        <tbody>
                            <tr>
                                <td>Direccion</td>
                                <td><input type="text" name="txtDireccion" value="" /></td>
                            </tr>
                            <tr>
                                <td>Comuna</td>
                                <td><select name="cmbComuna">
                                        <option></option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Educacion</td>
                                <td><select name="cmbEducacion">
                                        <option></option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="chkExperiencia" value="ON" /> 
                                </td>
                                <td>
                                    Experiencia laboral en el area de programacion
                                </td>



                            </tr>
                            <tr>
                                <td>
                                    cantidad años 
                                </td>
                                <td>
                                    <input type="number" name="txtAños" value="" />
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <table border="1">
                        <thead>
                            <tr>
                                Modalidad y curso al que postula
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Modalidad</td>
                                <td><select name="cmbModalidad">
                                        <option>Diurno</option>
                                        <option>Vespertino</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Curso</td>
                                <td><select name="cmbCurso">
                                        <option>Java</option>
                                        <option>.Net</option>
                                        <option>Php</option>
                                    </select></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <br>            

            <input type="submit" value="Postular" name="btnPostular" />



        </form>
    </body>
</html>
<style>

    .column {
        float: left;
        width: 50%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>
