<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos - TPCSI</title>
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
            <a href="../public/index.php?c=usuario&a=modificarContra">Configurar Cuenta</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>

    <section class="botonesOpcciones">
        <h1><?php echo $_SESSION['nombreUsu']; ?> así se encuentra tu reparación</h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=usuarioIniciado'">Menú Usuario</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>

    <?php

    if (isset($_POST['codigo'])) {
        $_SESSION['codigoSegui'] = $_POST['codigo'];
    }

    $codigo = $_SESSION['codigoSegui'] ?? null;

    $datosAgrupadas = [];
    $codigoEncontrado = false;
    $recogido = false;

    foreach ($datos as $reparacion) {
        if ($reparacion['seguimientoParte'] == $codigo) {
            $codigoEncontrado = true;

            if ($reparacion['ParteRecogido'] == 0) {
                $clave = $reparacion['MarcaEquipo'] . ' ' . $reparacion['ModeloEquipo'];

                if (!isset($datosAgrupadas[$clave])) {
                    $datosAgrupadas[$clave] = [
                        'MarcaEquipo' => $reparacion['MarcaEquipo'],
                        'ModeloEquipo' => $reparacion['ModeloEquipo'],
                        'EquipoId' => $reparacion['EquipoId'],
                        'tareas' => []
                    ];
                }

                $datosAgrupadas[$clave]['tareas'][] = [
                    'ReparacionTarea' => $reparacion['ReparacionTarea'],
                    'PiezaNombre' => $reparacion['PiezaNombre'],
                    'descripcion' => $reparacion['TareaDescripccion'],
                    'MarcaPieza' => $reparacion['MarcaPieza'],
                    'ModeloPieza' => $reparacion['ModeloPieza'],
                    'TareaTiempo' => $reparacion['TareaTiempo'],
                    'TareaEstado' => $reparacion['TareaEstado']
                ];
            } else {
                $recogido = true;
            }
        }
    }

    if ($codigoEncontrado) {
        if (!$recogido) {
            foreach ($datosAgrupadas as $reparacion) {
                $totalTareas = count($reparacion['tareas']);
                $tareasCompletas = 0;

                foreach ($reparacion['tareas'] as $tarea) {
                    if ($tarea['TareaEstado'] == 1) {
                        $tareasCompletas++;
                    }
                }

                $porcentaje = $totalTareas > 0 ? ($tareasCompletas / $totalTareas) * 100 : 0;

                echo '<div class="fromData">';
                echo '<h2>Equipo: ' . $reparacion['MarcaEquipo'] . ' ' . $reparacion['ModeloEquipo'] . '</h2>';

                $color = ($porcentaje < 33.33) ? '#ff2f2f' : (($porcentaje < 66.66) ? '#fffc2f' : '#4caf50');

                echo '<div class="barra-progreso-blanca">';
                echo '<div class="barra-progreso" style="width: ' . $porcentaje . '%; background-color: ' . $color . '; height: 20px; margin-bottom: 10px;"></div>';
                echo '</div>';

                if (round($porcentaje) == 100) {
                    echo '<p style="color: green; font-weight: bold;">✅ Reparación completada. ¡Listo para ser recogido!</p>';
                } else {
                    echo '<p>' . round($porcentaje) . '% completado</p>';
                }

                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Tarea</th>';
                echo '<th>Descripción</th>';
                echo '<th>Pieza Substituida o Arreglada</th>';
                echo '<th>Marca Pieza</th>';
                echo '<th>Modelo Pieza</th>';
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
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div><br>';
            }
        } else {
            echo '<div class="fromData">';
            echo '<h1>No tienes reparaciones en curso</h1>';
            echo '</div><br>';
        }
    } else {
        echo '<div class="fromData">';
        echo '<h1>El código de seguimiento no es válido</h1>';
        echo '</div><br>';
    }

    ?>

</body>

</html>