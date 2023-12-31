<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <title>Blog de Videojuegos</title>
</head>
<body>
    <!-- Cabecera -->
    <header id="header">
        <!-- LOGO -->
        <div class="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php 
                    $categorias = conseguirCategorias($db);
                    if(!empty($categorias)): 
                        while($categoria = mysqli_fetch_assoc($categorias)): 
                ?>
            

                <li>
                    <a href="categoria.php?id=<?=$categoria['id'];?>"><?=$categoria['nombre']; ?></a>
                </li>

                <?php 
                        endwhile; 
                    endif;
                    
                ?>
                <li>
                    <a href="index.php">Sobre nosotros</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>

    <div class="container">