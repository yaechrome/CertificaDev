<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrarse</title>
    </head>
    <body>
        <h1>Registrarse</h1>
        <form action="agregarUsuario.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" name="txtRut" value="" required="true"/></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="txtNombre" value="" required="true"/></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno</td>
                        <td><input type="text" name="txtApellidoPaterno" value="" required="true"/></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><input type="text" name="txtApellidoMaterno" value="" required="true"/></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" name="txtContraseña1" value="" required="true"/></td>
                    </tr>
                    <tr>
                        <td>Repetir Contraseña</td>
                        <td><input type="password" name="txtContraseña2" value="" required="true"/></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <input type="submit" value="Registrar" name="btnRegistrar" />
        </form>
        <br>
        <a href="../login/Login.html">Volver</a>
    </body>
</html>
