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
        <form action="registro.php" method="POST" >
            <P>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" />
            </P>

            <P>
                <label for="surname">Apellidos</label>
                <input type="text" name="surname" id="surname" />
            </P>

            <P>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />
            </P>

            <P>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" />
            </P>
            <button>Registrar</button>
        </form>
    </div>
</aside>