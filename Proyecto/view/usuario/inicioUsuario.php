<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Usuario - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

    <header class="header_paginas">
        <div class="logo"><a href="./index.php">TPCSI</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú Usuario</a>
            <a href="../public/index.php?c=usuario&a=modificarContra">Configurar Cuenta</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>

    <section class="botonesOpcciones">
        <h1 class="bienvenida">Hola <?php echo $_SESSION['nombreUsu']; ?> bienvenido de nuevo</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>

    <section class="tarjeta">
        <h3><i class="fas fa-history"></i> Historial de reparaciones</h3>
        <p>Aquí podrás ver todas las reparaciones de tus equipos con la información completa del parte.</p>
        <button onclick="location.href='index.php?c=usuario&a=usuarioHistorial'">Ver Historial</button>
    </section>

    <section class="tarjeta">
        <h3><i class="fas fa-tools"></i> Estado de reparación</h3>
        <p>Aquí podrás ver el estado en el que se encuentra tu reparación a tiempo real.</p>
        <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Ver Estado de la Reparación</button>
    </section>


    <section class="tarjeta">
        <h3><i class="fas fa-user"></i> Configurar Cuenta</h3>
        <p>Aquí podrás cambiar la contraseña de tu cuenta.</p>
        <button onclick="location.href='index.php?c=usuario&a=modificarContra'">Configurar Cuenta</button>
    </section>


</body>