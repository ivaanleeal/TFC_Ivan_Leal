<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración tareas - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/fotosAmpli.js" defer></script>
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
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <button onclick="location.href='index.php?c=tarea&a=iniciarRegistro'">Crear Nueva Tarea</button>
    </section>

    <section class="botonesOpcciones">
        <h4>Buscar: </h4>
        <input type="text" id="filtroTexto" class="buscar" placeholder="Buscar por Numero tarea o Fecha">
        <button id="ordenartarea">Ordenar por Nº tarea</button>
        <button id="ordenarFecha">Ordenar por Fecha</button>
        <button id="btnLimpiarFiltros">Limpiar</button>
    </section>

    <section id="contenedortareas">
        <?php

        

        $empleadosPorDni = [];
        foreach ($datosEmple as $empleado) {
            $empleadosPorDni[$empleado->getDni()] = $empleado->getNombre() . ' ' . $empleado->getApellidos();
        }

        foreach ($datos as $tarea) {
            echo '<div class="fromData">';
            echo '<h2>Número Parte: ' . $tarea->getNumeroParte() . '</h2>';
            echo '<h2>Número Tarea: ' . $tarea->getIdTarea() . '</h2>';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Descripcción</th>';
            echo '<th>Estado</th>';
            echo '<th>Tiempo</th>';
            echo '<th>Imagen</th>';
            echo '<th>Empleado</th>';
            echo '<th></th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $tarea->getDescripcion() . '</td>';
            echo '<td>' . ($tarea->getEstado() ? 'Finalizado' : 'En Proceso') . '</td>';
            echo '<td>' . $tarea->getTiempo() . '</td>';

            echo '
            <td>
                <img src="' . $tarea->getImagen() . '" alt="Imagen de la tarea" class="img-mini" onclick="abrirLightbox(this.src)">
            </td>';

            
            echo '<td><a href="index.php?c=empleado&a=menuSoloUnEmpleado&dni=' . $tarea->getEmpleadoDni() . '">' . $tarea->getEmpleadoDni() . ' - ' . $empleadosPorDni[$tarea->getEmpleadoDni()] . '</a></td>';
           
            echo "<td><button onclick=\"location.href='index.php?c=tarea&a=editar&id_tarea={$tarea->getIdTarea()}'\">Editar tarea</button></td>";
            
            echo "<td>
            <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este tarea?')) { 
                window.location.href='index.php?c=tarea&a=eliminar&id_tarea=" . $tarea->getIdTarea() . "'; 
            }\">
                Eliminar tarea
            </button>
            </td>";
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </section>

  
<div id="lightbox" onclick="cerrarLightbox()">
    <span id="cerrar">&times;</span>
    <img id="lightbox-img">
</div>
