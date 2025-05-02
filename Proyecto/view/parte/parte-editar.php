<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Parte - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/filtarPartes.js" defer></script>
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
        <h1 class="bienvenida">Actualizar Parte</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=parte&a=menuParte'">Volver Listado Partes</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>




    <form method="post" action="index.php?c=parte&a=actualizar" class="formDatos">
        <div class="fromCon">
            <h2 class="bienvenida">Datos del Parte</h2>

            <label for="id_parte">Código Parte</label>
            <input type="text" name="id_parte" id="id_parte" class="form-control" required readonly value="<?php echo $parte->getNumeroParte(); ?>" />
            <span id="errorid_parte" class="errortexto"></span>
            <br><br>

            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control"
                required maxlength="9"
                value="<?php echo $parte->getFecha(); ?>" />
            <span id="errorfecha" class="errortexto"></span>
            <br><br>


            <label for="notas">Notas</label>
            <br>
            <textarea name="notas" id="notas" class="form-control" required placeholder="¿Qué le pasa al equipo?"><?php echo $parte->getNotas(); ?></textarea>
            <span id="errornotas" class="errortexto"></span>
            <br><br>

            <label for="seguimiento">Numero Seguimiento</label>
            <input type="text" name="seguimiento" id="seguimiento" class="form-control" required placeholder="Numero seguimiento" value="<?php echo $parte->getSeguimiento(); ?>" />
            <span id="errorseguimiento" class="errortexto"></span>
            <br><br>

            <label for="recogido">Recogido</label>
            <select name="recogido" required>
                <option default>Seleccione una...</option>
                <option value="0" <?= $parte->getRecogido() == 0 ? 'selected' : '' ?>>No</option>
                <option value="1" <?= $parte->getRecogido() == 1 ? 'selected' : '' ?>>Si</option>
            </select>
            <span id="errorrecogido" class="errortexto"></span>
            <br><br>

            <label for="cliente">Cliente</label>
            <select name="cliente_telefono" id="cliente_telefono" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php
                $clienteAsignado = $parte->getClienteTelefono();

                foreach ($datosUsu as $cli) {
                    $telefono = $cli->getTelefono();
                    $selected = ($telefono == $clienteAsignado) ? 'selected' : '';
                    echo "<option value='$telefono' $selected>".$cli->getTelefono() . " " . $cli->getNombre() . " " . $cli->getApellidos()."</option>";
                }
                ?>
            </select>
            <span id="errorcliente" class="errortexto"></span>
            <br><br>


            
            <label for="equipo">Equipo</label>
            <select name="equipo" id="equipo" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php
                $equipoAsignado = $parte->getIdEquipo();

                foreach ($datosEqui as $equi) {
                    $idEquipo = $equi->getIdEquipo();
                    $telefonoCliente = $equi->getClienteTelefono();
                    $selected = ($idEquipo == $equipoAsignado) ? 'selected' : '';
                    echo "<option value='$idEquipo' data-cliente='$telefonoCliente' $selected>$idEquipo / " . $equi->getMarca() . " / " . $equi->getModelo() . "</option>";
                }

                ?>
            </select>

            <span id="errorcliente" class="errortexto"></span>
            <br><br>

            <label for="empleado">Empleado</label>
            <select name="empleado" id="empleado" class="form-control">
                <option default>Seleccione Uno ...</option>
                <?php
                $empleadoAsignado = $parte->getEmpleadoDni();

                foreach ($datosEmple as $emp) {
                    $dni = $emp->getDni();
                    $nombreCompleto = $emp->getNombre() . ' ' . $emp->getApellidos();
                    $selected = ($dni == $empleadoAsignado) ? 'selected' : '';
                    echo "<option value='$dni' $selected>$nombreCompleto</option>";
                }
                ?>
            </select>
            <span id="errorcliente" class="errortexto"></span>
            <br><br>

            <button id="enviar" class="btn btn-success">Registrar</button>
        </div>
    </form>

</body>