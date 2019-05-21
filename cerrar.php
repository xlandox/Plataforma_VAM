<?php  
    //Inicio de sesion
    session_start();
    //Destruccion de sesion
    session_destroy();
    //Redireccionamiento
    header('Location:index.php');
?>