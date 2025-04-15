<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Reparaciones Informáticas</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="../Estilos/inicio_sesion.css">
    <script src="../JS/validaIniSesion.js" defer></script>
</head>

<body>
    <header class="header_paginas">
        <div class="logo"><a href="./index.php">Reparacions</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../HTML/contacto.php">Contacto</a>
            <a href="../public/index.php?c=usuario&a=login">Iniciar Sesión</a>
        </nav>
    </header>

    <section class="fromInicioSesion">
        <div>
            <h2 class="clientes">Accede a tu Área</h2>
            <form class="contenidoForm" method="post" action="index.php?c=usuario&a=loginVerificar">
                Nombre Usuario
                <input type="text" name="usuario" placeholder="Escriba su nombre de Usuario" class="input-estilo"><br />
                <p id="errorUsu"></p>
                <br /><br />

                Contraseña Usuario
                <input type="password" name="password" placeholder="Escriba su Contraseña" class="input-estilo"><br />
                <p id="errorPassw"></p>
                <br /><br />


                <label for="recordar">Recordar</label>
                <input type="checkbox" id="recordar" checked>

                <button class="boton" id="enviar" type="submit">Entrar</button>

            </form>
        </div>
    </section>
</body>