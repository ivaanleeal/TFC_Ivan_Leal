<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Empleados - TPCSI</title>
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
        <h1 class="bienvenida">Configuración de Empleados </h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <button onclick="location.href='index.php?c=empleado&a=iniciarRegistro'">Crear Nuevo Empleado</button>
    </section>

    <section class="botonesOpcciones">
        
        <div class="fromData">
            <h2>Buscar:</h2>
            <div id="filtrosContenedor">
                <input type="text" id="filtroDni" placeholder="Buscar por DNI">
                <input type="text" id="filtroNombre" placeholder="Buscar por Nombre">
                <input type="text" id="filtroApellidos" placeholder="Buscar por Apellidos">
                <button id="btnLimpiarFiltros">Limpiar</button>
            </div>
        </div>
    </section>



    <section id="contenedorClientes">
        <?php

        foreach ($datos as $cliente) {
            echo '<div class="fromData">';
            echo '<h2>DNI: ' . $cliente->getDni() . '</h2>';
            echo '<div class="tabla-responsive">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Nombre Empleado</th>';
            echo '<th>Apellidos</th>';
            echo '<th></th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $cliente->getNombre() . '</td>';
            echo '<td>' . $cliente->getApellidos() . '</td>';
            echo "<td><button onclick=\"location.href='index.php?c=empleado&a=editar&dni={$cliente->getDni()}'\">Editar Empleado</button></td>";
            echo "<td>
            <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este Empleado?')) { 
                window.location.href='index.php?c=empleado&a=eliminar&dni=" . $cliente->getDni() . "'; 
            }\">
                Eliminar Empleado
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