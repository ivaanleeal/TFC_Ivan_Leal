<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea - TPCSI</title>
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
        <h1 class="bienvenida">Actualizar Tarea</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=usuarioIniciadoAdmin'">Menú Admin</button>
        <button onclick="location.href='index.php?c=tarea&a=menuTarea'">Volver Listado Tareas</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=tarea&a=actualizar" class="formDatos" enctype="multipart/form-data">
        <div class="fromCon">
            <h2 class="bienvenida">Datos de la Tarea</h2>

            <label for="numero_parte">Código Parte</label>
            <input type="text" name="numero_parte" id="parte" class="form-control" required readonly value="<?php echo $tarea->getNumeroParte(); ?>" />
            <span id="errornumero_parte" class="errortexto"></span>
            <br><br>

            <label for="id_tarea">Código Tarea</label>
            <input type="text" name="id_tarea" id="id_tarea" class="form-control" required readonly value="<?php echo $tarea->getIdTarea(); ?>" />
            <span id="errorid_tarea" class="errortexto"></span>
            <br><br>


            <label for="Descripccion">Descripcción</label>
            <br>
            <textarea name="descripccion" id="descripccion" class="form-control" required><?php echo $tarea->getDescripcion(); ?></textarea>
            <span id="errordescripccion" class="errortexto"></span>
            <br><br>

            <label for="estado">Estado</label>
            <select name="estado" required>
                <option default>Seleccione una...</option>
                <option value="0" <?= $tarea->getEstado() == 0 ? 'selected' : '' ?>>En Proceso</option>
                <option value="1" <?= $tarea->getEstado() == 1 ? 'selected' : '' ?>>Finalizada</option>
            </select>
            <span id="errorestado" class="errortexto"></span>
            <br><br>

            <label for="tiempo">Tiempo Minutos</label>
            <input type="number" name="tiempo" id="tiempo" class="form-control" required placeholder="200 m" value="<?php echo $tarea->getTiempo(); ?>" />
            <span id="errortiempo" class="errortexto"></span>
            <br><br>


            <?php if ($tarea->getImagen()){ ?>
                <p>Imagen actual:</p>
                <img src="../imagenesSubidas/<?php echo $tarea->getImagen(); ?>" alt="Imagen actual" width="150">
                <p>Archivo: <?php echo $tarea->getImagen(); ?></p>
                <input type="hidden" name="imagen_actual" value="<?php echo $tarea->getImagen(); ?>">
            <?php } ?>

            <label for="imagen">Cambiar imagen (opcional):</label>
            <input type="file" name="imagen" id="imagen" class="form-control" />
            <span id="errorimagen" class="errortexto"></span>

            <label for="empleado">Empleado</label>
            <select name="empleado" id="empleado" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php
                $empleadoAsignado = $tarea->getEmpleadoDni();

                foreach ($datosEmple as $emp) {
                    $dni = $emp->getDni();
                    $nombreCompleto = $emp->getNombre() . ' ' . $emp->getApellidos();
                    $selected = ($dni == $empleadoAsignado) ? 'selected' : '';
                    echo "<option value='$dni' $selected>$nombreCompleto</option>";
                }
                ?>
            </select>
            <span id="errorEmpleado" class="errortexto"></span>
            <br><br>

            <button id="enviar" class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>