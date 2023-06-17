<?php
    error_reporting(~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
    session_start();

    // UBAH DATA DIBAWAH UNTUK KONEKSI DATABASE
    $server_name    = 'localhost';
    $db_user        = 'root';
    $db_password    = '';
    $database_name  = 'db_spk_maut';

    // JANGAN UBAH INI
    $config["server"]       = $server_name;
    $config["username"]     = $db_user;
    $config["password"]     = $db_password;
    $config["database_name"]= $database_name;
    
    include'includes/ez_sql_core.php';
    include'includes/ez_sql_mysqli.php';
    $db = new ezSQL_mysqli($config[username], $config[password], $config[database_name], $config[server]);
    include'includes/general.php';
    include'includes/paging.php';
        
    $mod = $_GET[m];
    $act = $_GET[act];

    $konek = mysqli_connect($server_name, $db_user, $db_password, $database_name);

?>