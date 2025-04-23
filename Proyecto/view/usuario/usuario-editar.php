<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente - TPCSI</title>
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
        <h1 class="bienvenida">Editar Cliente</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=usuario&a=registrarUsuario" class="formDatos">
        <div class="fromCon">
            <h2 class="bienvenida">Datos del Usuario</h2>

            <label for="teléfono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" required maxlength="9" placeholder="Número de Télefono" value="<?php echo $usuario->getTelefono();?>"/>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required placeholder="Nombre completo" value="<?php echo $usuario->getNombre() ;?>"/>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" required placeholder="Apellidos completos" value="<?php echo $usuario->getApellidos() ;?>"/>

            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" class="form-control" required placeholder="Nombre de usuario" value="<?php echo $usuario->getUsuario() ;?>"/>

            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" required placeholder="Contraseña segura" value="<?php echo $usuario->getContrasena() ;?>"/>

            <label for="privilegio">Privilegio</label>
            <select name="privilegio" required>
                <<option value="0" <?= $usuario->getPrivilegio() == 0 ? 'selected' : '' ?>>Usuario Normal</option>
                <option value="1" <?= $usuario->getPrivilegio() == 1 ? 'selected' : '' ?>>Usuario Administrador</option>
            </select>

            <hr />

            <label for="Contactar W">Contactar por Whatsap</label>
            <input type="checkbox" name="whatsap" id="whatsap" <?= $usuario->getWhatsap() ? 'checked' : '' ?> />

            <hr />

            <label for="Contactar Ll">Contactar mediente Llamada</label>
            <input type="checkbox" name="llamada" id="llamada" <?= $usuario->getLlamar() ? 'checked' : '' ?> />

            <hr />

            <button class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>
