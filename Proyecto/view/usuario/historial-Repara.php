<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Reparaciones - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <script src="../JS/ordenar.js" defer></script>
</head>

<body>

    <header class="header_paginas">
        <div class="logo"><a href="./index.php">TPCSI</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú Usuario</a>
            <a href="../public/index.php?c=usuario&a=modificarContra">Configurar Cuenta</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>

    <section>
        <h1>Reparaciones de tus dispositivos <?php echo $_SESSION['nombreUsu']; ?>:</h1>

        <section class="botonesOpcciones">
            <button onclick="window.history.back()">⬅ Página Anterior</button>
            <button onclick="location.href='index.php?c=usuario&a=usuarioIniciado'">Menú Usuario</button>
            <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
        </section>

        <section class="botonesOpcciones">
            <div class="fromData">
                <h2>Buscar por:</h2>
                <div id="filtrosContenedor">
                    <input type="text" id="filtroEquipoId" placeholder="Código Equipo">
                    <input type="date" id="filtroFechaParte" placeholder="Fecha Parte">
                    <input type="text" id="filtroNota" placeholder="Nota">
                    <input type="text" id="filtroTarea" placeholder="Tarea">
                    <input type="text" id="filtroDescripcion" placeholder="Descripción">
                    <input type="text" id="filtroPieza" placeholder="Pieza">
                    <input type="text" id="filtroMarcaPieza" placeholder="Marca Pieza">
                    <input type="text" id="filtroModeloPieza" placeholder="Modelo Pieza">
                    <input type="text" id="filtroTiempo" placeholder="Minutos">
                    <button type="button" id="btnLimpiarFiltrosTabla">Limpiar</button>
                </div>
            </div>
        </section>


        <br>

        <?php
        $datosAgrupadas = [];

        foreach ($datos as $reparacion) {
            $fechaFormateada = date("d/m/Y", strtotime($reparacion['FechaParte']));
            $clave = $reparacion['MarcaEquipo'] . ' ' . $reparacion['ModeloEquipo'] . ' ' . $fechaFormateada;

            if (!isset($datosAgrupadas[$clave])) {
                $datosAgrupadas[$clave] = [
                    'MarcaEquipo' => $reparacion['MarcaEquipo'],
                    'ModeloEquipo' => $reparacion['ModeloEquipo'],
                    'EquipoId' => $reparacion['EquipoId'],
                    'FechaParte' => $reparacion['FechaParte'],
                    'NotasParte' => $reparacion['NotasParte'],
                    'tareas' => []
                ];
            }

            $datosAgrupadas[$clave]['tareas'][] = [
                'ReparacionTarea' => $reparacion['ReparacionTarea'],
                'parte' => $reparacion['parte'],
                'ReparacionPieza' => $reparacion['ReparacionPieza'],
                'PiezaNombre' => $reparacion['PiezaNombre'],
                'descripcion' => $reparacion['TareaDescripccion'],
                'MarcaPieza' => $reparacion['MarcaPieza'],
                'ModeloPieza' => $reparacion['ModeloPieza'],
                'TareaTiempo' => $reparacion['TareaTiempo']
            ];
        }

        foreach ($datosAgrupadas as $reparacion) {
            echo '<div class="fromData">';
            echo '<h2>Equipo: ' . $reparacion['MarcaEquipo'] . ' ' . $reparacion['ModeloEquipo'] . '</h2>';
            echo '<div class="tabla-responsive">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Código Equipo</th>';
            echo '<th>Fecha parte:</th>';
            echo '<th>Nota</th>';
            echo '<th>Tarea</th>';
            echo '<th>Descripción</th>';
            echo '<th>Pieza Substituida o Arreglada</th>';
            echo '<th>Marca Pieza</th>';
            echo '<th>Modelo Pieza</th>';
            echo '<th>Minutos</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($reparacion['tareas'] as $tarea) {
                echo '<tr>';
                echo '<td>' . $reparacion['EquipoId'] . '</td>';
                echo '<td>' . date("d/m/Y", strtotime($reparacion['FechaParte'])) . '</td>';
                echo '<td>' . $reparacion['NotasParte'] . '</td>';
                echo '<td>' . $tarea['ReparacionTarea'] . '</td>';
                echo '<td>' . $tarea['descripcion'] . '</td>';
                echo '<td>' . $tarea['PiezaNombre'] . '</td>';
                echo '<td>' . $tarea['MarcaPieza'] . '</td>';
                echo '<td>' . $tarea['ModeloPieza'] . '</td>';
                echo '<td>' . $tarea['TareaTiempo'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </section>