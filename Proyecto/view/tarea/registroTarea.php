<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarea - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/validarTarea.js" defer></script>
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
        <h1 class="bienvenida">Crear Nueva Tarea</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=usuarioIniciadoAdmin'">Menú Admin</button>
        <button onclick="location.href='index.php?c=tarea&a=menuTarea'">Volver Listado Tareas</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>




    <form method="post" enctype="multipart/form-data" action="index.php?c=tarea&a=registrarTarea" class="formDatos">
        <div class="fromCon">
            <h2 class="bienvenida">Datos de la Tarea</h2>

            <label for="parte">Parte</label>
            <select name="parte" id="parte" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php

                foreach ($datosParte as $parte) {
                    echo "<option value='" . $parte->getNumeroParte() . "'>" . $parte->getNumeroParte() . " " . $parte->getNotas() . "</option>";
                }

                ?>

            </select>
            <span id="errorcliente" class="errortexto"></span>
            <br><br>


            <label for="descripccion">Descripccion</label>
            <br>
            <textarea name="descripccion" id="descripccion" class="form-control" required  placeholder="¿Qué tarea se realizó?"></textarea>
            <span id="errordescripccion" class="errortexto"></span>
            <br><br>

            <label for="estado">Estado</label>
            <select name="estado" required>
                <option value="0">En Proceso</option>
                <option value="1">Finalizado</option>
            </select>

            <label for="tiempo">Tiempo Minutos</label>
            <input type="number" name="tiempo" id="tiempo" class="form-control" required  placeholder="200 m"/>
            <span id="errortiempo" class="errortexto"></span>
            <br><br>

            <label for="imagen">imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" required  />
            <span id="errorimagen" class="errortexto"></span>
            <br><br>

            <label for="empleado">Empleado</label>
            <select name="empleado" id="empleado" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php

                foreach ($datosEmple as $empleado) {
                    echo "<option value='" . $empleado->getDni() . "'>" . $empleado->getNombre() . " " . $empleado->getApellidos() . "</option>";
                }

                ?>

            </select>
            <span id="errorEmpleado" class="errortexto"></span>
            <br><br>

            <button id="enviar" class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>