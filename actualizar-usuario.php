<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';

    //Recoger datos de actualización
    $nombre = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $apellidos = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
    //Array de errores
    $errores = array();

    //validar los datos antes de guardarlos en la base de datos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validate = true;
    }else{
        $nombre_validate = false;
        $errores['name'] = "El nombre no es válido";
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

    $guardar_usuario = false;
 
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;

        //COMPROBAR QUE EL EMAIL YA EXISTE
        $ql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, $ql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){

            //ACTULIZAR USUARIO EN L BASE DE DATOS
            
            $sql = "UPDATE usuarios SET ".
                    "nombre = '$nombre', ". 
                    "apellidos = '$apellidos', ". 
                    "email = '$email' ".
                    "WHERE id = ". $usuario['id'] ;
            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = 'Tus datos se han actualizado con éxito';
            }else{
                $_SESSION['errores']['general'] ="Fallo al actualizar tus datos!!";
            }

            }else{
                $_SESSION['errores']['general'] = "El email ya existe!!";
            }    

        }else{
            $_SESSION['errores'] = $errores;
        }
}
header('Location: mis-datos.php');