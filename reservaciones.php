<?php
    session_start();
    $sesion=$_SESSION['sesion'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Estilos-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Inicio</title>
</head>
<body>
    <!--Menu superior-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="inicio.php"><img src="img/icon.png" alt="icono" id="icono"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#nosotros">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="paquete.php">Paquetes</a>
                            </li>
                        </ul>
                        <button id="sesion" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><?php echo $sesion ?></button>
                        <!--Modal-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="info">
                                            <div class="d-flex justify-content-center" id="avatar">
                                                <img src="img/avatar.png" alt="avatar">
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <h3><?php echo $sesion ?></h3>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="botones_modal">
                                            <div class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-outline-primary" onclick="reservaciones()">Reservaciones</button>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-outline-danger" onclick="cerrar()">Cerrar sesion</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Ocultar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Termina modal-->
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Escribe aqui" aria-label="Search">
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!--Termina menu superior-->
    <?php 
        include('conn_sqlsrv.php');
        $consulta=sqlsrv_query($conn, "SELECT*FROM tbl_usuarios WHERE usuario='$sesion'");
        $row=sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC);
        $id_u=$row['id_u'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <h1>Reservaciones</h1>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Vuelo</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Actividad</th>
                    </tr>
                </thead>
                <?php
                    $consultareservaciones=sqlsrv_query($conn, "SELECT*FROM tbl_reservaciones WHERE id_u = $id_u");
                    while($rowreservaciones=sqlsrv_fetch_array($consultareservaciones, SQLSRV_FETCH_ASSOC)){
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $rowreservaciones['id_r'] ?></th>
                        <?php
                            $destino=$rowreservaciones['id_d'];
                            $consultadestinos=sqlsrv_query($conn, "SELECT*FROM tbl_destinos WHERE id_d = $destino");
                            $rowdestino=sqlsrv_fetch_array($consultadestinos, SQLSRV_FETCH_ASSOC);
                        ?>
                        <td><?php echo $rowdestino['nombre'] ?></td>
                        <?php
                            $vuelo=$rowreservaciones['id_v'];
                            $consultavuelos=sqlsrv_query($conn, "SELECT*FROM tbl_vuelos WHERE id_v = $vuelo");
                            $rowvuelo=sqlsrv_fetch_array($consultavuelos, SQLSRV_FETCH_ASSOC);
                        ?>
                        <td><?php echo $rowvuelo['fecha'] ?></td>
                        <?php  
                            $hotel=$rowreservaciones['id_h'];
                            $consultahoteles=sqlsrv_query($conn, "SELECT*FROM tbl_hoteles WHERE id_h = $hotel");
                            $rowhotel=sqlsrv_fetch_array($consultahoteles, SQLSRV_FETCH_ASSOC);
                        ?>
                        <td><?php echo $rowhotel['nombre'] ?></td>
                        <?php
                            $actividad=$rowreservaciones['id_a'];
                            $consultaactividades=sqlsrv_query($conn, "SELECT*FROM tbl_actividades WHERE id_a = $actividad");
                            $rowactividad=sqlsrv_fetch_array($consultaactividades, SQLSRV_FETCH_ASSOC);
                        ?>
                        <td><?php echo $rowactividad['nombre'] ?></td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
    <!-- JavaScript -->
    <script src="js/eventos.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>