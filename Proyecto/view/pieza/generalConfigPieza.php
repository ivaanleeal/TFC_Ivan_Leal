<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Piezas - TPCSI</title>
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
        <h1 class="bienvenida">Configuración de Empleados </h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <button onclick="location.href='index.php?c=pieza&a=iniciarRegistro'">Crear Nueva Pieza</button>
    </section>

    <section class="botonesOpcciones">
        <h4>Buscar: </h4><input type="text" id="filtroTexto" class="buscar" placeholder="Buscar por DNI">
        <button id="btnLimpiarFiltros">Limpiar</button>
    </section>

    <section id="contenedorPiezass">
        <?php
       
        foreach ($datos as $piezas) {
            echo '<div class="fromData">';
            echo '<h2>Código Pieza: ' . $piezas->getCodigoPieza() . '</h2>';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Nombre Pieza</th>';
            echo '<th>Marca</th>';
            echo '<th>Modelo</th>';
            echo '<th></th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $piezas->getNombre() . '</td>';
            echo '<td>' . $piezas->getMarca() . '</td>';
            echo '<td>' . $piezas->getModelo() . '</td>';
            echo "<td><button onclick=\"location.href='index.php?c=pieza&a=editar&codigo_pieza={$piezas->getCodigoPieza()}'\">Editar Pieza</button></td>";
            echo "<td>
            <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar esta Pieza?')) { 
                window.location.href='index.php?c=pieza&a=eliminar&codigo_pieza=" . $piezas->getCodigoPieza() . "'; 
            }\">
                Eliminar Pieza
            </button>
            </td>";
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </section>