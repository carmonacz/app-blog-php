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

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);

    $resultado = array();

    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }

    return $resultado;
}

function conseguirUltimasEntradas($conexion){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ". 
           "INNER JOIN categorias c ON e.categoria_id = c.id ". 
           "ORDER BY e.id DESC LIMIT 4";

    $entradas = mysqli_query($conexion, $sql);

    $resultado = array();

    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    return $resultado;
}