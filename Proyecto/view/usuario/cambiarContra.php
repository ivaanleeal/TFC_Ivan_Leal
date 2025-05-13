<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion Empleado - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/validaContra.js"></script>
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
        <h1 class="bienvenida">Configuración Empleado</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=usuario&a=actualizarContra" class="formDatos">
        <div class="fromCon">
            <h2 class="bienvenida">Estos son tus datos <?php echo $_SESSION['nombreUsu']; ?></h2>

            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required maxlength="9" placeholder="Numero del usuario" readonly value="<?php echo $empleado->getUsuario(); ?>" />
            <span id="errorusuario" class="errortexto"></span>
            <br><br>

            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" required  placeholder="Nueva contraseña" />
            <span id="errorpassword" class="errortexto"></span>
            <br>

            <button id="enviar" class="btn btn-success">Guardar</button>


            <input type="hidden" name="telefono" id="telefono" value="<?php echo $empleado->getTelefono(); ?>" />
            <input type="hidden" name="nombre" id="nombre" value="<?php echo $empleado->getNombre(); ?>" />
            <input type="hidden" name="apellidos" id="apellidos" value="<?php echo $empleado->getApellidos(); ?>" />
            <input type="hidden" name="privilegio" id="privilegio" value="<?php echo $empleado->getPrivilegio(); ?>" />
            <input type="hidden" name="whatsap" id="whatsap" value="<?php echo $empleado->getWhatsap(); ?>" />
            <input type="hidden" name="llamada" id="llamada" value="<?php echo $empleado->getLlamar(); ?>" />
        
        </div>
    </form>

</body>