<?php

function mostrarError($errores, $campo){
    $alert = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alert = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alert;

}

function borrarErrores(){
    if(isset($_SESSION['errores'])){
    $_SESSION['errores'] = null;
    unset($_SESSION['errores']);
    }

    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }

    /* session_unset($_SESSION['errores']); */

    return;
}