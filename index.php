<!doctype html>
<?php
    include("conn_sqlsrv.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Estilos -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Viajes</title>
</head>
<body>
    <!--Icono-->
    <div class="d-flex justify-content-center" id="icono_sesion">
        <img src="img/icon.png" alt="icono">
    </div>
    <!--Termina Icono-->
    <!--Formulario del login-->
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="usuario">Nombre de usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="Helpu" placeholder="Introduce tu nombre de usuario">
                    <small id="Helpu" class="form-text text-muted">Ten cuidado con las mayusculas y minusculas.</small>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contrasena</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena" aria-describedby="Helpc" placeholder="Introduce tu contrasena">
                    <small id="Helpc" class="form-text text-muted">Asegura muy bien tu contrasena</small>
                </div>
                <br>
                <div class="d-flex justify-content-center" id="boton_sesion">
                    <button type="submit" class="btn btn-primary" name="validar">Iniciar sesion</button>
                    <button type="button" class="btn btn-success" onclick="registro()">Registrarse</button>
                </div>
                <br>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
    <!--Termina el formulario-->
    <!--Codigo "validar"-->
    <?php
        if(isset($_POST['validar'])){
            $usuariova=$_POST['usuario'];
            $contrasenava=$_POST['contrasena'];
            $consulta="SELECT * FROM tbl_usuarios WHERE usuario = '$usuariova' AND contrasena = '$contrasenava'";
            $ejecutar=sqlsrv_query($conn,$consulta);
            $filas=sqlsrv_has_rows($ejecutar);
            if($filas==true){
                $info=sqlsrv_fetch_array($ejecutar);
                $rol=$info['rol'];
                session_start();
                $_SESSION['sesion']=$usuariova;
                if($rol==1){
                    header("Location:admin.php");
                }else{
                    header("Location:inicio.php");
                }
            }
            else{
                echo '
                <br>
                <div class="alert alert-danger" role="alert">
                    Error al iniciar sesion. Verifica tus datos. 
                </div>';
            }
        }
    ?>
    <!--Termina "validar"-->
    <!--Scripts-->
    <script src="js/eventos.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>     
</body>
</html>