<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="buscarSolicitudPorRut.php" method="POST">
            <div>
                Rut: <input type="text" name="txtRut" value="" />   <input type="submit" value="Buscar" name="btnBuscarPorRut" />
            </div>
        </form>
        <form action="buscarSolicitudPorFecha.php" method="POST">
        
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
        <?php
        // isset retorna boolean..sirve para ver si la variable
        //esta definida y es distinta de NULL
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
                            <td><?php echo 'Acciones' ?></td>                          
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php         
        }      
        ?>
    </body>
</html>
