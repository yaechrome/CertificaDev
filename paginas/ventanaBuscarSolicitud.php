<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../static/css/codebeautify.css" type="text/css"/>
    <div class="text_right">
        <a class="btn red darken-1" href=../login/logout.php>Cerrar Sesion </a>
    </div>
    <title></title>
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
                                    <form action="buscarSolicitudPorRut.php" method="POST">
                                        <div class="text_left">
                                            <div class="mb20"><h3 class="medium title black-text">Buscar por RUT</h3></div>  
                                            <table border="1">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="input-field col s12">
                                                                <label for="txtRut">Rut</label><br>
                                                                <input class="validate" name="txtRut" type="text">
                                                                <br><br>
                                                            </div>
                                                        </td>
                                                        <td> <input type="submit" value="Buscar" name="btnBuscarPorRut" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                    </form>
                                    <form action="buscarSolicitudPorFecha.php" method="POST">
                                        <div class="text_left">
                                            <div class="mb20"><h3 class="medium title black-text">Buscar por rango de fechas</h3></div>  
                                            <table border="1">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="input-field col s12">
                                                                <label for="txtDesde">Desde</label><br>
                                                                <input class="validate" name="txtDesde" type="date" value="">
                                                                <br><br>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-field col s12">
                                                                <label for="txtHasta">Hasta</label><br>
                                                                <input class="validate" name="txtHasta" type="date" value="">
                                                                <br><br>
                                                            </div>
                                                        </td>
                                                        <td><input type="submit" value="Buscar" name="btnBuscarPorFecha" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> 
                                    </form>
                                    <?php if (isset($_SESSION["listaDesplegar"])) { ?>
                                        <table border="1"  class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="black-text">Rut</th>
                                                    <th class="black-text">Nombre</th>
                                                    <th class="black-text">Estado</th>
                                                    <th class="black-text">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once '../dto/PostulacionDto.php';
                                                include_once '../dto/UsuarioDto.php';
                                                foreach ($_SESSION["listaDesplegar"] as $dto) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $dto->getUsuario()->getRut(); ?></td>
                                                        <td><?php echo $dto->getUsuario()->getNombre() . ' ' . $dto->getUsuario()->getApellidoPaterno() . ' ' . $dto->getUsuario()->getApellidoMaterno(); ?></td>
                                                        <td><?php echo $dto->getEstado(); ?></td>
                                                        <td>
                                                            <a href="ventanaVerFichaPostulante.php?id=<?php echo $dto->getId(); ?>">Ver</a>
                                                            <a href="ventanaEditarPostulacion.php?id=<?php echo $dto->getId(); ?>">Editar</a>
                                                            <a href="eliminarPostulacion.php?id=<?php echo $dto->getId(); ?>">Eliminar</a>
                                                        </td>                          
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    ?>
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
