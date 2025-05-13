<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Mensajes - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/vistoMensaje.js" defer></script>
    <script src="../JS/ordenarMensaje.js" defer></script>
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
        <h1 class="bienvenida">Configuración de Mensajes </h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <h4>Buscar por:</h4>
        <input type="text" id="filtroId" placeholder="ID"/>
        <input type="text" id="filtroNombre" placeholder="Nombre">
        <input type="text" id="filtroApellidos" placeholder="Apellidos">
        <input type="text" id="filtroCorreo" placeholder="Correo">
        <input type="text" id="filtroMensaje" placeholder="Mensaje">
        <button id="btnLimpiarFiltros">Limpiar</button>
    </section>



    <section id="contenedormensajes">
        <div class="formDatos">
            <h1 class="bienvenida">📥 Bandeja de Entrada</h1>
            <div class="fromData">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Visto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($mensajes)) { ?>
                            <tr>
                                <td colspan="5">No hay mensajes en la bandeja de entrada.</td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($mensajes as $msg) { ?>

                            <tr>
                                <td><?= $msg->getId() ?></td>
                                <td><?= $msg->getNombre() ?></td>
                                <td><?= $msg->getApellidos() ?></td>
                                <td><?= $msg->getCorreo() ?></td>
                                <td><?= $msg->getMensaje() ?></td>
                                <td>
                                    <input type="checkbox" class="checkbox-visto" data-id="<?= $msg->getId() ?>" <?= ($msg->getleido() === 1) ? 'checked' : '' ?>>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>