<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reparación - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/validarReparacion.js"></script>
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
        <h1 class="bienvenida">Crear Nueva Reparación</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=reparacion&a=menuReparacion'">Volver Listado Reparaciones</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=reparacion&a=registrarReparacion" class="formDatos">
        <div class="fromCon">
            <h2 class="bienvenida">Datos de la Reparación</h2>

            <label for="parte">Número Parte</label>
            <select name="parte" id="parte" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php

                foreach ($datosPartes as $parte) {
                    echo "<option value='" . $parte->getNumeroParte() . "'>" . $parte->getNumeroParte() . " " . $parte->getNotas() . "</option>";
                }

                ?>

            </select>
            <span id="errorParte" class="errortexto"></span>
            <br><br>

            <label for="tarea">Número Tarea</label>
            <select name="tarea" id="tarea" class="form-control" data-seleccionado="">
                <option value="">Seleccione Uno ...</option>
                <?php foreach ($datosTareas as $tarea): ?>
                    <option value="<?= $tarea->getIdTarea() ?>"
                        data-parte="<?= $tarea->getNumeroParte() ?>">
                        <?= $tarea->getIdTarea() . " " . $tarea->getDescripcion() ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <span id="errorTarea" class="errortexto"></span>
            <br><br>

            <label for="pieza">Pieza</label>
            <select name="pieza" id="pieza" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php

                foreach ($datosPiezas as $pieza) {
                    echo "<option value='" . $pieza->getCodigoPieza() . "'>" . $pieza->getCodigoPieza() . " " . $pieza->getNombre() . " " . $pieza->getMarca() . " " . $pieza->getModelo() . "</option>";
                }

                ?>

            </select>
            <span id="erroraPieza" class="errortexto"></span>
            <br>

            <button id="enviar" class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>