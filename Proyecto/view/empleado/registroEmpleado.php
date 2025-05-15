<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Empleado - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/validacionDatosEmpleados.js"></script>
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
        <h1 class="bienvenida">Crear Nuevo Empleado</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=usuarioIniciadoAdmin'">Menú Admin</button>
        <button onclick="location.href='index.php?c=empleado&a=menuEmpleado'">Volver Listado Empleados</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=empleado&a=registrarEmpleado" class="formDatos">
    <div class="fromCon">
            <h2 class="bienvenida">Datos del Empleado</h2>

            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" required maxlength="9" placeholder="Numero del DNI" />
            <span id="errordni" class="errortexto"></span>
            <br><br>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre completo"/>
            <span id="errornombre" class="errortexto"></span>
            <br><br>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos completos"/>
            <span id="errorapellido" class="errortexto"></span>
            <br>
            
            <button id="enviar" class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>