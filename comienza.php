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
    <title>Comienza</title>
</head>
<body background="img/comienza.jpg">
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
                                <a class="nav-link" href="inicio.php#nosotros">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="comienza.php">Paquetes</a>
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
    <!--Busqueda-->
    <div class="container" id="comienza">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="formulario">
                    <form action="comienza.php" method="POST">
                        <div class="input-group">
                            <?php
                                include ('conn_sqlsrv.php');
                                $query="SELECT*FROM tbl_destinos";
                                $consulta=sqlsrv_query($conn,$query);
                            ?>
                            <select class="custom-select" id="inputGroupSelect04" name="destino" aria-label="Example select with button addon">
                                <option selected>Destino</option>
                                <?php while($row = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)){ ?>
                                    <option value="<?php echo $row['id_d']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit" name="buscar">Buscar</button>
                            </div>
                        </div>
                        <br>
                    </form>
                    <?php 
                        if(isset($_POST['buscar'])){
                            $destino=$_POST['destino'];
                            echo '
                                <form action="comienza.php" method="POST">
                                <br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="vuelos">Vuelos</label>
                                    </div>
                            ';
                                    $queryv="SELECT*FROM tbl_vuelos WHERE id_d=$destino";
                                    $consultav=sqlsrv_query($conn,$queryv); 
                            echo '
                                    <select class="custom-select" id="vuelos" name="vuelo">
                            ';
                                    while($rowv = sqlsrv_fetch_array($consultav)){
                                        echo '<option value="'; echo $rowv['id_v']; echo '">Fecha: '; echo $rowv['fecha']; echo ', Clase: '; echo $rowv['clase']; echo ', Personas: '; echo $rowv['personas']; echo '</option>';
                                    }
                            echo '
                                    </select>
                                </div>
                            ';
                            echo '
                                <br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="hoteles">Hoteles</label>
                                    </div>
                            ';
                                    $queryh="SELECT*FROM tbl_hoteles WHERE id_d=$destino";
                                    $consultah=sqlsrv_query($conn,$queryh); 
                            echo '
                                    <select class="custom-select" id="hoteles" name="hotel">
                            ';
                                    while($rowh = sqlsrv_fetch_array($consultah)){
                                        echo '<option value="'; echo $rowh['id_h']; echo '">'; echo $rowh['nombre']; echo', Tipo de habitacion: '; echo $rowh['tipo']; echo '</option>';
                                    }
                            echo '
                                    </select>
                                </div>
                            ';
                            echo '
                                <br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="actividades">Actividades</label>
                                    </div>
                            ';
                                    $querya="SELECT*FROM tbl_actividades WHERE id_d=$destino";
                                    $consultaa=sqlsrv_query($conn,$querya); 
                            echo '
                                    <select class="custom-select" id="actividades" name="actividad">
                            ';
                                    while($rowa = sqlsrv_fetch_array($consultaa)){
                                        echo '<option value="'; echo $rowa['id_a']; echo '">'; echo $rowa['nombre']; echo '</option>';
                                    }
                            echo '
                                    </select>
                                </div>
                            ';
                            echo '
                                <br>
                                <div class="d-flex justify-content-center" id="btn_ver">
                                    <button type="submit" class="btn btn-primary" name="listo">Listo</button>
                                </div>
                                </form>
                            ';
                        }
                    ?>
                </div>
                <?php
                    if(isset($_POST['listo'])){
                        $vuelo=$_POST['vuelo'];
                        $hotel=$_POST['hotel'];
                        $actividad=$_POST['actividad'];
                        $queryd1="SELECT*FROM tbl_vuelos WHERE id_v = $vuelo";
                        $consultad1=sqlsrv_query($conn, $queryd1);
                        $rowd1 = sqlsrv_fetch_array($consultad1, SQLSRV_FETCH_ASSOC);
                        $destino=$rowd1['id_d'];
                        echo '
                            <br>
                            <div class="d-flex justify-content-center" id="icono_ticket">
                                <img src="img/ticket.png" alt="icono_ticket">
                            </div>
                            <br>
                            <div class="d-flex justify-content-center" id="btn_ver">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">Verificar Ticket</button>
                            </div>
                        ';
                    }
                ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ticket de viaje para: <?php echo $sesion ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Destino:</h4>
                                <?php
                                    $consultadt=sqlsrv_query($conn,"SELECT*FROM tbl_destinos WHERE id_d = $destino");
                                    $rowdt=sqlsrv_fetch_array($consultadt, SQLSRV_FETCH_ASSOC);
                                    echo $rowdt['nombre'];
                                ?>
                                <h4>Vuelo:</h4>
                                <?php
                                    $consultavt=sqlsrv_query($conn,"SELECT*FROM tbl_vuelos WHERE id_v = $vuelo");
                                    $rowvt=sqlsrv_fetch_array($consultavt, SQLSRV_FETCH_ASSOC);
                                    ?>Fecha: <?php echo $rowvt['fecha'] ?>, CLase: <?php echo $rowvt['clase']?>, Personas: <?php echo$rowvt['personas'];
                                ?>
                                <h4>Hotel</h4>
                                <?php
                                    $consultaht=sqlsrv_query($conn,"SELECT*FROM tbl_hoteles WHERE id_h = $hotel");
                                    $rowht=sqlsrv_fetch_array($consultaht, SQLSRV_FETCH_ASSOC);
                                    ?>Nombre: <?php echo $rowht['nombre'] ?>, Tipo de habitacion: <?php echo $rowht['tipo'] 
                                ?>
                                <h4>Actividad:</h4>
                                <?php
                                    $consultaat=sqlsrv_query($conn,"SELECT*FROM tbl_actividades WHERE id_a = $actividad");
                                    $rowat=sqlsrv_fetch_array($consultaat, SQLSRV_FETCH_ASSOC);
                                    echo $rowat['nombre'];
                                ?>
                                <h4>Total:</h4>
                                <?php 
                                    $total=$rowvt['precio']+$rowht['precio']+$rowat['precio'];
                                    ?>$<?php echo $total;
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form action="comienza.php" method="POST">
                                    <input type="hidden" id="sesiondb" name="sesdb" value="<?php echo $sesion ?>">
                                    <input type="hidden" id="destinodb" name="desdb" value="<?php echo $destino ?>">
                                    <input type="hidden" id="vuelodb" name="vuedb" value="<?php echo $vuelo ?>">
                                    <input type="hidden" id="hoteldb" name="hotdb" value="<?php echo $hotel ?>">
                                    <input type="hidden" id="actividaddb" name="actdb" value="<?php echo $actividad ?>">
                                    <input class="btn btn-primary" type="submit" value="Comprar" name="comprar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Termina Modal -->
                <?php
                    if(isset($_POST['comprar'])){
                        $sesdb=$_POST['sesdb'];
                        $desdb=$_POST['desdb'];
                        $vuedb=$_POST['vuedb'];
                        $hotdb=$_POST['hotdb'];
                        $actdb=$_POST['actdb'];
                        $consultadb=sqlsrv_query($conn, "SELECT*FROM tbl_usuarios WHERE usuario = '$sesdb'");
                        $rowdb=sqlsrv_fetch_array($consultadb, SQLSRV_FETCH_ASSOC);
                        $usudb=$rowdb['id_u'];
                        $insercion=sqlsrv_query($conn, "INSERT INTO tbl_reservaciones VALUES ($usudb,$desdb,$vuedb,$hotdb,$actdb)");
                        if($insercion){
                            echo '
                                <br>
                                <br>
                                <div class="alert alert-primary" role="alert">
                                    Tu compra fue realizada exitosamente.
                                </div>
                                <br>
                                <div class="d-flex justify-content-center" id="btn_ver">
                                    <button type="button" class="btn btn-success" onclick="reservaciones()">Reservaciones</button>
                                </div>
                                <br>
                                <form action="imprimir.php" method="POST">
                                    <input type="hidden" id="sesiondb" name="usudb" value="'; echo $usudb; echo '">
                                    <input type="hidden" id="destinodb" name="desdb" value="'; echo $desdb; echo '">
                                    <input type="hidden" id="vuelodb" name="vuedb" value="'; echo $vuedb; echo '">
                                    <input type="hidden" id="hoteldb" name="hotdb" value="'; echo $hotdb; echo '">
                                    <input type="hidden" id="actividaddb" name="actdb" value="'; echo $actdb; echo '">
                                    <div id="btn_imp">
                                        <input class="btn btn-primary" type="submit" value="Imprimir" name="imprimir" formtarget="_blank">
                                    <div>
                                </form>
                            ';
                        }
                        else{
                            echo '
                                <br>
                                <br>
                                <div class="alert alert-danger" role="alert">
                                    Ocurrio un error al realizar tu compra.
                                </div>
                            ';
                        }
                    }
                ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <!--Termina busqueda-->
    <!-- JavaScript -->
    <script src="js/eventos.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>