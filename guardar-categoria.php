<?php
if(isset($_POST)){
    require_once 'includes/conexion.php';


    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

     //Array de errores
     $errores = array();

     //validar los datos antes de guardarlos en la base de datos
     if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
         $nombre_validate = true;
     }else{
         $nombre_validate = false;
         $errores['nombre'] = "El nombre no es válido";
     }

     if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(NULL, '$nombre', CURDATE());";
        $guardar = mysqli_query($db, $sql);
     }

}

header('Location: index.php');