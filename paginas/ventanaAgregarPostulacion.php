<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="agregarPostulacion.php" method="POST">

            <table border="0">
                <tbody>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" name="txtRut" value="" disabled="true"/></td>
                        <td>Direccion</td>
                        <td><input type="text" name="txtDireccion" value="" /></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="txtNombre" value="" disabled="true"/></td>
                        <td>Comuna</td>
                        <td><select name="cmbComuna">
                                <?php
                                include_once '../dao/ComunaDaoImp.php';
                                foreach (ComunaDaoImp::listar() as $value) { ?>
                                    <option><?php echo $value; ?></option>                                
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno</td>
                        <td><input type="text" name="txtApellidoPaterno" value="" disabled="true"/></td>
                        <td>Educacion</td>
                        <td><select name="cmbEducacion">
                                <?php
                                include_once '../dao/EducacionDaoImp.php';
                                foreach (EducacionDaoImp::listar() as $value) { ?>
                                    <option><?php echo $value; ?></option>                                
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><input type="text" name="txtApellidoMaterno" value="" disabled="true"/></td>
                        <td>
                            Experiencia laboral en el area de programacion
                        </td>
                        <td>
                            <input type="checkbox" name="chkExperiencia" value="ON" /> 
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha Nacimiento</td>
                        <td><input type="Date"  name="txtFechaNacimiento" value="" /></td>
                        <td>
                            cantidad años 
                        </td>
                        <td>
                            <input type="number" name="txtAños" value="18" />
                        </td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td>M<input type="radio" name="Sexo" value="M" checked="checked" /> F<input type="radio" name="Sexo" value="F" /></td>
                        <td>
                            Modalidad y curso al que postula
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input type="text" name="txtTelefono" value="" /></td>
                        <td>Modalidad</td>
                        <td><select name="cmbModalidad">
                                <option>Diurno</option>
                                <option>Vespertino</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="txtEmail" value="" /></td>
                        <td>Curso</td>
                        <td><select name="cmbCurso">
                                <option>Java</option>
                                <option>.Net</option>
                                <option>Php</option>
                            </select></td>
                    </tr>
                </tbody>
            </table>
            <br>            
            <input type="submit" value="Postular" name="btnPostular" />
        </form>
    </body>
</html>

