<?php
    session_start();
    $sesion=$_SESSION['sesion'];
    include("conn_sqlsrv.php");
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
                    <a class="navbar-brand" href="admin.php">Admin VAM</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="adminusu.php">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminres.php">Reservaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admindes.php">Destinos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminvue.php">Vuelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminhot.php">Hoteles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminact.php">Actividades</a>
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
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <h2>Hoteles</h2>
        <br>
        <div class="col-12">
            <div class="btn_adminusu">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalUsu">Agregar hotel</button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalUsu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="formulario">
                        <form action="nuevo.php" method="POST">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Nombre</span>
                                </div>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre del hotel" required>
                            </div>
                            <br>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Tipo</span>
                                </div>
                                <input type="text" class="form-control" name="tipo" placeholder="Eje. 'Sencilla'..." required>
                            </div>
                            <br>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Precio</span>
                                </div>
                                <input type="text" class="form-control" name="precio" placeholder="$$$" required>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Destino</label>
                                </div>
                                <?php
                                    include ('conn_sqlsrv.php');
                                    $query="SELECT*FROM tbl_destinos";
                                    $consulta=sqlsrv_query($conn,$query);
                                ?>
                                <select class="custom-select" id="inputGroupSelect01" name="destino">
                                    <option selected>Selecciona el destino</option>
                                    <?php while($row = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)){ ?>
                                        <option value="<?php echo $row['id_d']; ?>"><?php echo $row['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>
                            <br>
                            <div class="d-flex justify-content-center" id="btnmodalusu">
                                <button type="submit" class="btn btn-primary" name="insertar_hot">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </div>
        <br>
        <div class="col-12">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Destino</th>
                    </tr>
                </thead>
                <?php
                    $query="SELECT*FROM tbl_hoteles";
                    $consulta=sqlsrv_query($conn,$query);
                    while ($row=sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $row['id_h'] ?></th>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['tipo'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td><?php echo $row['id_d'] ?></td>
                    </tr>
                </tbody>
                <?php } ?>
                </table>
        </div>
    </div>
    <script src="js/eventos.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>