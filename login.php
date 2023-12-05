<?php
//Iniciar la sesion y la conexion a bd
require_once 'includes/conexion.php';
if(!isset($_SESSION)){
    session_start();
}
//recoger datos del formulario
if(isset($_POST)){

    //Borrar error antiguo
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }

    //Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);

        //comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);

        if($verify){
            //utilizar una sesión par guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;

        }else{
            //Si algo falla enviar una sesión con el fallo
            $_SESSION['error_login'] = "Login incorrecto!!";
        }

    }else{
        //mensaje de error
        $_SESSION['error_login'] = "Login incorrecto!!";
    }

}

header('Location: index.php');







//redirigir al index.php