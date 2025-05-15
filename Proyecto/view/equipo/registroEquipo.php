<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Equipo - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/validacionDatosEquipo.js" defer></script>
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
        <h1 class="bienvenida">Crear Nuevo Equipo</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=usuarioIniciadoAdmin'">Menú Admin</button>
        <button onclick="location.href='index.php?c=equipo&a=menuEquipo'">Volver Listado Equipos</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=equipo&a=registrarequipo" class="formDatos">
        <div class="fromCon">
            <h2 class="bienvenida">Datos del Equipo</h2>

            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" required placeholder="Marca" />
            <span id="errormarca" class="errortexto"></span>
            <br><br>

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" required placeholder="Modelo" />
            <span id="errormodelo" class="errortexto"></span>
            <br><br>

            <label for="so">Sistema Operativo</label>
            <input type="text" name="so" id="so" class="form-control" required maxlength="9" placeholder="Sistema Operativo" />
            <span id="errorso" class="errortexto"></span>
            <br><br>

            <label for="cliente">Cliente</label>
            <select name="cliente_telefono" id="cliente_telefono" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php

                foreach ($datosUsu as $usuario) {
                    echo "<option value='" . $usuario->getTelefono() . "'>" . $usuario->getTelefono() . " " . $usuario->getNombre() . " " . $usuario->getApellidos() . "</option>";
                }

                ?>

            </select>
            <span id="errorcliente" class="errortexto"></span>
            <br><br>

            <button id="enviar" class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>