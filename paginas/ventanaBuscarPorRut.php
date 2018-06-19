<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <form action="buscarSolicitudPorRut.php" method="POST">
            <div>
                <h6>Buscar Por Rut</h6>
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
        
        <?php
        if(isset($_SESSION["estadoUltima"])){ 
            echo $_SESSION["estadoUltima"];  
        }      
        ?>
        <br><br>
        <a href=../login/panel-control.php>Volver </a> <br>
        <a href=../login/logout.php>Cerrar Sesion</a>
    </body>
</html>
