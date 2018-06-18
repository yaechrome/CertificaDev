<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="buscarSolicitud.php" method="POST">
            <div>
                Rut: <input type="text" name="txtRut" value="" />   <input type="submit" value="Buscar" name="btnBuscarPorRut" />
            </div>
            <div>
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Desde <input type="date" name="txtDesde" value="" /></td>
                            <td>Hasta <input type="date" name="txtHasta" value="" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Buscar" name="btnBuscarPorFecha" /></td>
                        </tr>
                    </tbody>
                </table>

            </div>
                
        </form>
    </body>
</html>
