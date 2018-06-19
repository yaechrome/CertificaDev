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
        <form action="buscarSolicitudPorFecha.php" method="POST">
            <div>
                <h6>Buscar Por Rango de Fecha</h6>
                <table border="1">
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
        <?php
        if(isset($_SESSION["listaDesplegar"])){ ?>
        <table border="1"  class="table table-hover">
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     include_once '../dto/PostulacionDto.php';
                     include_once '../dto/UsuarioDto.php';
                    foreach ($_SESSION["listaDesplegar"] as $dto) { ?>
                        <tr>
                            <td><?php echo $dto->getUsuario()->getRut(); ?></td>
                            <td><?php echo $dto->getUsuario()->getNombre().' '.$dto->getUsuario()->getApellidoPaterno().' '.$dto->getUsuario()->getApellidoMaterno(); ?></td>
                            <td><?php echo $dto->getEstado(); ?></td>
                            <td><a href="ventanaEditarPostulacion.php">Editar</a></td>                          
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php         
        }      
        ?>
        <br><br>
        <a href=../login/panel-control.php>Volver</a> <br>
        <a href=../login/logout.php>Cerrar Sesion</a>
    </body>
</html>
