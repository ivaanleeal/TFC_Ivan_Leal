<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Tareas - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/fotosAmpli.js" defer></script>
    <script src="../JS/ordenarTareas.js" defer></script>
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
        <h1 class="bienvenida">Configuración de Tareas </h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=usuarioIniciadoAdmin'">Menú Admin</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <button onclick="location.href='index.php?c=tarea&a=iniciarRegistro'">Crear Nueva Tarea</button>
    </section>

    <section class="botonesOpcciones">
        <div class="fromData">
            <h2>Buscar Tareas:</h2>
            <div id="filtrosContenedor">
                <input type="text" id="filtroNumeroParte" placeholder="Nº Parte">
                <input type="text" id="filtroNumeroTarea" placeholder="Nº Tarea">
                <input type="text" id="filtroDescripcion" placeholder="Descripción">
                <input type="text" id="filtroEstado" placeholder="Estado">
                <input type="text" id="filtroTiempo" placeholder="Tiempo (min)">
                <input type="text" id="filtroEmpleado" placeholder="Empleado">
                <input type="text" id="filtroCliente" placeholder="Cliente">
                <button type="button" id="btnLimpiarFiltrosTarea">Limpiar</button>
                <button type="button" id="btnOrdenarTareas">Ordenar por Nº Tarea</button>
            </div>
        </div>
    </section>



    <section id="contenedortareas">
        <?php

        $empleadosPorDni = [];
        foreach ($datosEmple as $empleado) {
            $empleadosPorDni[$empleado->getDni()] = $empleado->getNombre() . ' ' . $empleado->getApellidos();
        }


        $usuariosPorParte = [];

        foreach ($datosPartes as $parte) {
            $numeroParte = $parte[0];
            $usuariosPorParte[$numeroParte] = [
                'telefono' => $parte[1],
                'nombre' => $parte[2],
                'apellidos' => $parte[3]
            ];
        }



        foreach ($datos as $tarea) {
            echo '<div class="fromData">';
            echo '<div class="tabla-responsive">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Número Parte</th>';
            echo '<th>Número Tarea</th>';
            echo '<th>Descripcción</th>';
            echo '<th>Estado</th>';
            echo '<th>Tiempo Minutos</th>';
            echo '<th>Imagen</th>';
            echo '<th>Empleado</th>';
            echo '<th>Cliente</th>';
            echo '<th></th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $tarea->getNumeroParte() . '</td>';
            echo '<td>' . $tarea->getIdTarea() . '</td>';
            echo '<td>' . $tarea->getDescripcion() . '</td>';
            echo '<td>' . ($tarea->getEstado() ? 'Finalizado' : 'En Proceso') . '</td>';
            echo '<td>' . $tarea->getTiempo() . '</td>';

            echo '
            <td>
                <img src="' . $tarea->getImagen() . '" alt="Imagen de la tarea" class="img-mini" onclick="abrirLightbox(this.src)">
            </td>';


            echo '<td><a href="index.php?c=empleado&a=menuSoloUnEmpleado&dni=' . $tarea->getEmpleadoDni() . '">' . $tarea->getEmpleadoDni() . ' - ' . $empleadosPorDni[$tarea->getEmpleadoDni()] . '</a></td>';

            $np = $tarea->getNumeroParte();
            $usuario = $usuariosPorParte[$np];

            echo '<td><a href="index.php?c=usuario&a=menuSoloUnRegistro&telefono=' .
                $usuario['telefono'] . '">' .
                $usuario['telefono'] . " " . $usuario['nombre'] . ' ' . $usuario['apellidos'] .
                '</a></td>';



            echo "<td><button onclick=\"location.href='index.php?c=tarea&a=editar&numero_parte=" . $tarea->getNumeroParte() . "&id_tarea=" . $tarea->getIdTarea() . "';\">Editar Tarea </button></td>";


            echo "<td>
                <button onclick=\"
                if(confirm('¿Estás seguro de que quieres eliminar esta Tarea?')) {
                window.location.href='index.php?c=tarea&a=eliminar&numero_parte=" . $tarea->getNumeroParte() . "&id_tarea=" . $tarea->getIdTarea() . "';
                }
                \">
                    Eliminar Tarea
                </button>
            </td>";

            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </section>


    <div id="lightbox" onclick="cerrarLightbox()">
        <span id="cerrar">&times;</span>
        <img id="lightbox-img">
    </div>