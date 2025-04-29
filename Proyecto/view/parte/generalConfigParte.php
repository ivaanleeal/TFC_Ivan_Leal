<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Partes - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/ordenarEmpleados.js" defer></script>
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
        <h1 class="bienvenida">Configuración de Partes </h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <button onclick="location.href='index.php?c=parte&a=iniciarRegistro'">Crear Nuevo Parte</button>
    </section>

    <section class="botonesOpcciones">
        <h4>Buscar: </h4><input type="text" id="filtroTexto" class="buscar" placeholder="Buscar por Numero Parte o Fecha">
        <button id="btnLimpiarFiltros">Limpiar</button>
    </section>

    <section id="contenedorpartes">
        <?php
       
        foreach ($datos as $parte) {
            echo '<div class="fromData">';
            echo '<h2>Número Parte: ' . $parte->getNumeroParte() . '</h2>';
            echo '<h2>Fecha: ' .  date("d/m/Y", strtotime($parte->getFecha())) . '</h2>';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Notas</th>';
            echo '<th>Seguimiento</th>';
            echo '<th>Recogido</th>';
            echo '<th>Cliente</th>';
            echo '<th>Equipo</th>';
            echo '<th>Empleado</th>';
            echo '<th></th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $parte->getNotas() . '</td>';
            echo '<td>' . $parte->getSeguimiento() . '</td>';
            echo '<td>' . ($parte->getRecogido() ? 'Sí' : 'No') . '</td>';
            echo '<td>' . $parte->getClienteTelefono() . '</td>';
            echo '<td>' . $parte->getIdEquipo() . '</td>';
            echo '<td>' . $parte->getEmpleadoDni() . '</td>';
            echo "<td><button onclick=\"location.href='index.php?c=parte&a=editar&dni={$parte->getNumeroParte()}'\">Editar Parte</button></td>";
            echo "<td>
            <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este Parte?')) { 
                window.location.href='index.php?c=parte&a=eliminar&dni=" . $parte->getNumeroParte() . "'; 
            }\">
                Eliminar Parte
            </button>
            </td>";
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </section>