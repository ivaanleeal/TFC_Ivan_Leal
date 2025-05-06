<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Pieza - TPCSI</title>
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
        <h1 class="bienvenida">Crear Nueva Pieza</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=pieza&a=menuPieza'">Volver Listado Piezas</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=pieza&a=registrarPieza" class="formDatos">
    <div class="fromCon">
            <h2 class="bienvenida">Datos de la Pieza</h2>

            <label for="codigo_pieza">Código Pieza</label>
            <input type="text" name="codigo_pieza" id="codigo_pieza" class="form-control" required maxlength="6" placeholder="AAA123" />
            <span id="errorCodigo_pieza" class="errortexto"></span>
            <br><br>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre Pieza"/>
            <span id="errornombre" class="errortexto"></span>
            <br><br>

            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" required placeholder="Asus"/>
            <span id="errorMarca" class="errortexto"></span>
            <br><br>

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" required placeholder="Modelo Pieza"/>
            <span id="errorModelo" class="errortexto"></span>
            <br>
            
            <button id="enviar" class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>