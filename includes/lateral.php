<?php require_once 'helpers.php'; ?>

<!-- BARRA LATERAL -->
<aside id="sidebar">
    <div id="login" class="block-aside">
        <h3>Indentificate</h3>
        <form action="login.php" method="POST" >
            <P>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />
            </P>
            
            <P>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" />
            </P>
            <button>Entrar</button>
        </form>
    </div>
    
    
    <div id="register" class="block-aside">        
        <h3>Registrate</h3>

        <!-- Mostrar errores -->
        <?php if(isset($_SESSION['completado'])): ?>
        <div class="alerta alerta-exito"><?= $_SESSION['completado'];?></div> 
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
        <div class="alerta alerta-error"><?= $_SESSION['errores']['general'];?></div>     
        <?php endif; ?>
        <form action="registro.php" method="POST" >
            <P>
                <label for="name">Nombre</label>
                <input type="text" name="name" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
            </P>

            <P>
                <label for="surname">Apellidos</label>
                <input type="text" name="surname" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'surname') : ''; ?>
            </P>

            <P>
                <label for="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
            </P>

            <P>
                <label for="password">Contraseña</label>
                <input type="password" name="password" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
            </P>
            <button name="submit">Registrar</button>
        </form>
        <?php borrarErrores(); ?>
    </div>
</aside>