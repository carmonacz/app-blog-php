<?php require_once './includes/cabecera.php'; ?>  


<?php require_once './includes/lateral.php'; ?>

        
<!-- CAJA PRINCIPAL -->
<div class="principal">
    <h1>Ultimas entradas</h1>

    <?php
        $entradas = conseguirEntradas($db, true);
        if(!empty($entradas)):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>

    <article class="todo">
        <a href="entrada.php?id=<?=$entrada['id']; ?>">
            <h2><?=$entrada['titulo'];?></h2>
            <span class="fecha"><?=$entrada['categoria']. ' | '. $entrada['fecha_registro'] .' | ' . $entrada['usuario'] ;?></span>
            <p><?=substr($entrada['descripcion'], 0, 200)."..."; ?></p>
        </a>
    </article>

    <?php
            endwhile;
        endif;
    ?>
    

    <div class="ver-todas">
        <a href="entradas.php">Ver todas las entradas</a>
    </div>
</div> <!-- Fin PRINCIPAL -->
        
<?php require_once './includes/pie.php' ; ?>
    


