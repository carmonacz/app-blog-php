<?php require_once './includes/redireccion.php'; ?>
<?php require_once './includes/cabecera.php'; ?>  
<?php require_once './includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div class="principal">
    <h1>Crear Entradas</h1>

    <form action="guardar-entradas.php" method="POST">
        <p>Añade nuevas entradas al blog para que los usuarios puedan leer y disfrutar de nuesro contenido.</p>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoría:</label>
        <select name="categoria" id="">
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>

            <option value="<?=$categoria['id']?>">
                <?=$categoria['nombre']?>
            </option>

            <?php
                    endwhile;
                endif;
            ?>

        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

        <button>Guardar</button>
    </form>

    <?php borrarErrores(); ?>

</div> <!-- Fin PRINCIPAL -->
        
<?php require_once './includes/pie.php' ; ?>