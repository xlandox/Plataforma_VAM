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
                    <a class="navbar-brand" href="inicio.php">Admin VAM</a>
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
    <?php
        if(isset($_POST['insertar_usu'])){
            $nombre=$_POST['nom'];
            $apellidos=$_POST['ape'];
            $usuario=$_POST['usu'];
            $contrasena=$_POST['con'];
            $query="INSERT INTO tbl_usuarios VALUES ('$nombre','$apellidos','$usuario','$contrasena',1)";
            $insertar=sqlsrv_query($conn,$query);
            if($insertar){
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_ok">
                        <img src="img/ok.png" alt="ok">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminusu()">Regregar</button>
                    </div>
                ';
            }
            else{
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_tache">
                        <img src="img/error.png" alt="error">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminusu()">Regregar</button>
                    </div>
                ';
            }
        }
        if(isset($_POST['insertar_des'])){
            $nom_des=$_POST['nom_des'];
            $queryd="INSERT INTO tbl_destinos VALUES ('$nom_des')";
            $insertard=sqlsrv_query($conn,$queryd);
            if($insertard){
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_ok">
                        <img src="img/ok.png" alt="ok">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_admindes()">Regregar</button>
                    </div>
                ';
            }
            else{
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_tache">
                        <img src="img/error.png" alt="error">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_admindes()">Regregar</button>
                    </div>
                ';
            }
        }

        if(isset($_POST['insertar_hot'])){
            $nombreh=$_POST['nombre'];
            $tipo=$_POST['tipo'];
            $precioh=$_POST['precio'];
            $destinoh=$_POST['destino'];
            $queryh="INSERT INTO tbl_hoteles VALUES ('$nombreh','$tipo',$precioh,$destinoh)";
            $insertarh=sqlsrv_query($conn,$queryh);
            if($insertarh){
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_ok">
                        <img src="img/ok.png" alt="ok">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminhot()">Regregar</button>
                    </div>
                ';
            }
            else{
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_tache">
                        <img src="img/error.png" alt="error">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminhot()">Regregar</button>
                    </div>
                ';
            }
        }

        if(isset($_POST['insertar_vue'])){
            $fecha=$_POST['fecha'];
            $clase=$_POST['clase'];
            $personas=$_POST['personas'];
            $preciov=$_POST['precio'];
            $destinov=$_POST['destino'];
            $queryv="INSERT INTO tbl_vuelos VALUES ('$fecha','$clase',$personas,$preciov,$destinov)";
            $insertarv=sqlsrv_query($conn,$queryv);
            if($insertarv){
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_ok">
                        <img src="img/ok.png" alt="ok">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminvue()">Regregar</button>
                    </div>
                ';
            }
            else{
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_tache">
                        <img src="img/error.png" alt="error">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminvue()">Regregar</button>
                    </div>
                ';
            }
        }
        if(isset($_POST['insertar_act'])){
            $nombrea=$_POST['nombre'];
            $descripcion=$_POST['descripcion'];
            $precioa=$_POST['precio'];
            $destinoa=$_POST['destino'];
            $querya="INSERT INTO tbl_actividades VALUES ('$nombrea','$descripcion',$precioa,$destinoa)";
            $insertara=sqlsrv_query($conn,$querya);
            if($insertara){
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_ok">
                        <img src="img/ok.png" alt="ok">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminact()">Regregar</button>
                    </div>
                ';
            }
            else{
                echo '
                    <br>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_tache">
                        <img src="img/error.png" alt="error">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center" id="icono_boton">
                        <button type="button" class="btn btn-primary" onclick="regresar_adminact()">Regregar</button>
                    </div>
                ';
            }
        }
    ?>
    <script src="js/eventos.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>