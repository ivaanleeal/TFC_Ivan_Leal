<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="../Estilos/inicio_sesion.css">
    <script src="../JS/validaIniSesion.js" defer></script>
</head>

<body>
    <header class="header_paginas">
        <div class="logo"><a href="./index.php">TPCSI</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <a href="../public/index.php?c=usuario&a=login">Iniciar Sesión</a>
        </nav>
    </header>

    <section class="fromInicioSesion">
        <div>
            <h2 class="clientes">Accede a tu Área</h2>

            <?php
            $valorUsuario = '';

            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'])) {
                $valorUsuario = $_POST['usuario'];
            }
            elseif (isset($_COOKIE['usuario'])) {
                $valorUsuario = $_COOKIE['usuario'];
            }
            ?>



            <form class="contenidoForm" method="post" action="index.php?c=usuario&a=loginVerificar">


                <?php if (!empty($error)) { ?>
                    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
                <?php } ?>

                <br />

                Nombre Usuario
                <input type="text" name="usuario" class="input-estilo"
                    value="<?= htmlspecialchars($valorUsuario) ?>"
                    placeholder="Escriba su nombre de Usuario">
                <br />
                <p id="errorUsu"></p>
                <br /><br />


                Contraseña Usuario
                <input type="password" name="password" placeholder="Escriba su Contraseña" class="input-estilo"><br />
                <p id="errorPassw"></p>
                <br /><br />


                <label for="recordar">Recordar</label>
                <label>
                    <input type="checkbox" name="recordar" <?php if (isset($_COOKIE['usuario'])) echo 'checked'; ?> checked>
                </label>


                <button class="boton" id="enviar" type="submit">Entrar</button>

            </form>
        </div>
    </section>
</body>