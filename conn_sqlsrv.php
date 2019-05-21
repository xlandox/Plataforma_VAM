<?php
    //Nombre del servidor
    $serverName = "DESKTOP-MJE7OD2";
    //Nombre de la base, nombre de usuario (sqlsrv), contrasena (sqlsrv)
    $connectionInfo = array( "Database"=>"db_vam");
    //Variable $conn
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
