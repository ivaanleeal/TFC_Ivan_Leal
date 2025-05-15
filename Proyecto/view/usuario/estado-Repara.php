<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de Reparación - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>

<body>
    <header class="header_paginas">
        <div class="logo"><a href="../index.html">TPCSI</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú Usuario</a>
            <a href="../public/index.php?c=usuario&a=modificarContra">Configurar Cuenta</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>

    <main>
        <h1>Consulta el Estado de tu Equipo <?php echo $_SESSION['nombreUsu']; ?></h1>

        <section class="botonesOpcciones">
            <button onclick="window.history.back()">⬅ Página Anterior</button>
            <button onclick="location.href='index.php?c=usuario&a=usuarioIniciado'">Menú Usuario</button>
            <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
        </section>

        <section class="busqueda">
            <h1>Introduzca el código que le dieron en la tienda</h1>

            <h4>Buscar Por Equipo: </h4>
            <form action="index.php?c=usuario&a=usuarioEstadoRepara" method="post">
                <label for="codigo">Introduce tu código:</label>
                <input type="text" id="codigo" name="codigo" placeholder="Código de reparación" class="buscar" required>

                <button type="submit" id="buscar">Consultar</button>
            </form>
        </section>
    </main>
</body>

</html>