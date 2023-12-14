<?php require_once './includes/redireccion.php'; ?>
<?php require_once './includes/cabecera.php'; ?>  
<?php require_once './includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div class="principal">
    <h1>Mis datos personales</h1>

    <!-- Mostrar errores -->
    <?php if(isset($_SESSION['completado'])): ?>
    <div class="alerta alerta-exito"><?= $_SESSION['completado'];?></div> 
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
    <div class="alerta alerta-error"><?= $_SESSION['errores']['general'];?></div>     
    <?php endif; ?>
    <form action="actualizar-usuario.php" method="POST" >
        <P>
            <label for="name">Nombre</label>
            <input type="text" name="name" value="<?= $_SESSION['usuario']['nombre']; ?>" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
        </P>

        <P>
            <label for="surname">Apellidos</label>
            <input type="text" name="surname" value="<?= $_SESSION['usuario']['apellidos']; ?>" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'surname') : ''; ?>
        </P>

        <P>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?= $_SESSION['usuario']['email']; ?>"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
        </P>

        <button name="submit">Actualizar</button>
    </form>
    <?php borrarErrores(); ?>
    


</div> <!-- Fin PRINCIPAL -->
        
<?php require_once './includes/pie.php' ; ?>