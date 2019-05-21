<!DOCTYPE html>
<?php
    include("conn_sqlsrv.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Estilos-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro</title>
</head>
<body>
    <!--Formulario de registro-->
    <div class="container">
        <!--Titulo-->
        <div class="row">
            <div class="col-12" id="titulo_registro">
                <br>
                <br>
                <h1>Registro de usuario</h1>
                <br>
                <br>
            </div>
        </div>
        <!--Termina el titulo-->
        <div class="row">
            <div class="col-3"></div>
            <!--Comienza los campos de registro-->
            <div class="col-6">
                <div class="formulario">
                    <form action="registro.php" method="POST">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nombre</span>
                            </div>
                            <input type="text" class="form-control" name="nom" placeholder="Escribe tu nombre aqui" required>
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Apellidos</span>
                            </div>
                            <input type="text" class="form-control" name="ape" placeholder="Escribe tus apellidos aqui" required>
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Usuario</span>
                            </div>
                            <input type="text" class="form-control" name="usu" placeholder="Escribe tu nombre de usuario aqui" required>
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">contrasena</span>
                            </div>
                            <input type="password" class="form-control" name="con" placeholder="Escribe tu contrasena aqui" required>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex justify-content-center" id="boton_registro">
                            <button type="submit" class="btn btn-primary" name="insertar">Guardar</button>
                            <button type="button" class="btn btn-success" onclick="inicio()">Regresar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--Terminan los campos de registro-->
            <div class="col-3"></div>
        </div>
    </div>
    <!--Termina formulario-->
    <!--Codigo "insertar"-->
    <?php
        if(isset($_POST['insertar'])){
            $nombre=$_POST['nom'];
            $apellidos=$_POST['ape'];
            $usuario=$_POST['usu'];
            $contrasena=$_POST['con'];
            $query="INSERT INTO tbl_usuarios VALUES ('$nombre','$apellidos','$usuario','$contrasena',0)";
            $insertar=sqlsrv_query($conn,$query);
            if($insertar){
                echo '
                <br>
                <br>
                <div class="alert alert-primary" role="alert">
                    Tu cuenta fue creada exitosamente.
                </div>';
            }
            else{
                echo '
                <br>
                <br>
                <div class="alert alert-danger" role="alert">
                    Ocurrio un error al crear tu cuenta.
                </div>';
            }
        }    
    ?>
    <!--Termina codigo "insertar"-->
    <!--Scripts-->
    <script src="js/eventos.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>