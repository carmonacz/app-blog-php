<?php

function mostrarError($errores, $campo){
    $alert = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alert = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alert;

}

function borrarErrores(){
    $_SESSION['errores'] = null;

    unset($_SESSION['errores']);

    /* session_unset($_SESSION['errores']); */

    return;
}