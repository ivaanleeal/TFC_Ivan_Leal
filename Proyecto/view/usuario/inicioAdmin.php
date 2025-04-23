<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Administrador - TPCSI</title>
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
            <a href="../public/index.php?c=usuario&a=usuarioIniciadoAdmin">Menú Admin</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>

    <section class="botonesOpcciones">
        <h1 class="bienvenida">Hola Administrador <?php echo $_SESSION['nombreUsu']; ?> bienbenido de nuevo</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>

    <div class="gridTarjetas">
        <section class="tarjetaAdmin">
            <h3><i class="fas fa-users-gear"></i> Configuración de Clientes</h3>
            <p>Aquí podrás gestionar los clientes de la empresa.</p>
            <button onclick="location.href='index.php?c=usuario&a=menuRegistro'">Administrar Clientes</button>
        </section>

        <section class="tarjetaAdmin">
            <h3><i class="fas fa-user-cog"></i> Configuración de Empleados</h3>
            <p>Aquí podrás gestionar el personal técnico de la empresa.</p>
            <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Administrar Empleados</button>
        </section>

        <section class="tarjetaAdmin">
            <h3><i class="fas fa-desktop"></i> Configuración de Equipos</h3>
            <p>Aquí podrás gestionar los equipos informáticos registrados.</p>
            <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Administrar Equipos</button>
        </section>

        <section class="tarjetaAdmin">
            <h3><i class="fas fa-file-alt"></i> Configuración de Partes</h3>
            <p>Aquí podrás crear y administrar partes de reparación.</p>
            <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Administrar Partes</button>
        </section>

        <section class="tarjetaAdmin">
            <h3><i class="fas fa-tasks"></i> Configuración de Tareas</h3>
            <p>Aquí podrás asignar y seguir tareas relacionadas con los partes.</p>
            <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Administrar Tareas</button>
        </section>

        <section class="tarjetaAdmin">
            <h3><i class="fas fa-screwdriAdministrar-wrench"></i> Configuración de Reparaciones</h3>
            <p>Aquí podrás controlar todas las reparaciones en curso y finalizadas.</p>
            <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Administrar Reparaciones</button>
        </section>

        <section class="tarjetaAdmin">
            <h3><i class="fas fa-cogs"></i> Configuración de Piezas</h3>
            <p>Aquí podrás administrar el inventario de piezas.</p>
            <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Administrar Piezas</button>
        </section>

        <section class="tarjetaAdmin">
            <h3><i class="fas fa-envelope-open-text"></i> Administrar Mensajes</h3>
            <p>Aquí podrás leer los mensajes enviados por los usuarios.</p>
            <button onclick="location.href='index.php?c=usuario&a=usuarioRepara'">Administrar Mensajes</button>
        </section>

    </div>

</body>