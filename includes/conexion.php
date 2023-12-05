<?php
// Conexion
$server = 'netcarmona.es';
$username = 'w284570_jose';
$password = '=G&H05}5ow^N';
$database = 'w284570_blog_master';

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesion

session_start();