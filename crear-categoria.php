<?php require_once './includes/redireccion.php'; ?>
<?php require_once './includes/cabecera.php'; ?>  
<?php require_once './includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div class="principal">
    <h1>Crear Categorias</h1>

    <form action="guardar-categoria.php" method="POST">
        <p>Añade nuevas categorías al blog para que los usuarios puedan cear sus entradas</p>
        <br/>
        <label for="nombre">Nombre de la Categoría:</label>
        <input type="text" name="nombre"/>

        <button>Guardar</button>
    </form>

</div> <!-- Fin PRINCIPAL -->
        
<?php require_once './includes/pie.php' ; ?>