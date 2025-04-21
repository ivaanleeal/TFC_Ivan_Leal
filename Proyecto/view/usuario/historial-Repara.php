<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - datos Informáticas</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>

<body>

    <header class="header_paginas">
        <div class="logo"><a href="./index.php">TPCSI</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú Usuario</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>

    <section>
        <h1>Reparaciones de tus dispositivos <?php echo $_SESSION['nombreUsu']; ?>:</h1>

        
        <h4>Buscar Por Equipo: </h4> <input type="text" id="filtroTabla" class="buscar" placeholder="Buscar Por NombreEquipo...">

        <?php
        $datosAgrupadas = [];

        foreach ($datos as $reparacion) {
            $fechaFormateada = date("d/m/Y", strtotime($reparacion['FechaParte']));
            $clave = $reparacion['MarcaEquipo'] . ' ' . $reparacion['ModeloEquipo'] . ' ' . $fechaFormateada;

            if (!isset($datosAgrupadas[$clave])) {
                $datosAgrupadas[$clave] = [
                    'MarcaEquipo' => $reparacion['MarcaEquipo'],
                    'ModeloEquipo' => $reparacion['ModeloEquipo'],
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
            echo '<h3>Fecha parte: ' .date("d/m/Y", strtotime($reparacion['FechaParte'])) . '</h3>';
            echo '<h3>Nota: ' . $reparacion['NotasParte'] . '</h3>';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
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
            echo '<br><br>';
        }
        ?>
    </section>

    <script>
        document.getElementById('filtroTabla').addEventListener('keyup', function() {
            const filtro = this.value.toLowerCase();
            const tablas = document.querySelectorAll('.fromData');

            tablas.forEach(tabla => {
                const textoTabla = tabla.innerText.toLowerCase();
                tabla.style.display = textoTabla.includes(filtro) ? '' : 'none';
            });
        });
    </script>


    </section>