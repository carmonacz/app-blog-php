<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST['name'])){

     $nombre =  mysqli_real_escape_string($db, $_POST['name']);           
        
    }else{
        $nombre = false;
    }

    $apellidos = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //Array de errores
    $errores = array();

    //validar los datos antes de guardarlos en la base de datos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validate = true;
    }else{
        $nombre_validate = false;
        $errores['nombre'] = "El nombre no es válido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validate = true;
    }else{
        $apellidos_validate = false;
        $errores['surname'] = "El apellido no es válido";
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validate = true;
    }else{
        $email_validate = false;
        $errores['email'] = "El email no es válido";
    }

    if(!empty($password)){
        $password_validate = true;
    }else{
        $password_validate = false;
        $errores['password'] = "El password no es válido";
    }

    $guardar_usuario = false;
 
    if(count($errores) == 0){
        $guardar_usuario = true;

        //cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        
        //INSERTAR USUARIO EN L BASE DE DATOS
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);

        if($guardar){
            $_SESSION['completado'] = 'El registro se ha completado con éxito';
        }else{
            $_SESSION['errores']['general'] ="Fallo al guardar el usuario!!";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');