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
        <form action="buscarPostulante.php" method="POST">
            <div>
                <h6>Buscar Postulante Por Rut</h6>
                <table border="1">
                    <tbody>
                        <tr>
                            <td>Rut <input type="text" name="txtRut" value="" /></td>
                            <td> <input type="submit" value="Buscar" name="btnBuscarPorRut" /></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </div>
        </form>
        
        <br><br>
        <a href=../login/volver.php>Volver</a> <br>
        <a href=../login/logout.php>Cerrar Sesion</a>
    </body>
</html>
