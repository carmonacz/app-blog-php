<?php require_once './includes/cabecera.php'; ?>  


<?php require_once './includes/lateral.php'; ?>

        
<!-- CAJA PRINCIPAL -->
<div class="principal">
    <h1>Todas entradas</h1>

    <?php
        $entradas = conseguirEntradas($db);
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
    

</div> <!-- Fin PRINCIPAL -->
        
<?php require_once './includes/pie.php' ; ?>
    


