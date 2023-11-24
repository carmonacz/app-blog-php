<?php
// Conexion
$server = 'localhost';
$username = 'administrador';
$password = 'administrador';
$database = 'blog_master';

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");