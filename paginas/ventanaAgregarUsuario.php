<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="../static/css/codebeautify.css" type="text/css"/>
        <meta charset="UTF-8">
        <title>Registrarse</title>
    </head>
    <body>
        <main role="main">
            <section class="container">
                <div class="row mb0 center-align relative full">
                    <div class="center">
                        <div class="col s12 m6 offset-m3 l4 offset-l4">
                            <div class="card">
                                <div class="card-panel pad0">
                                    <div class="card-content pad24">
                                        <div class="mb20"><h3 class="medium title">REGISTRARSE</h3></div>                  
                                        <form action="agregarUsuario.php" method="POST">
                                            <table class="responsive-table striped" border="0">
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
