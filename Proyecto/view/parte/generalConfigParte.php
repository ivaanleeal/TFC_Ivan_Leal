<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Partes - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/ordenarPartes.js" defer></script>
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
        <div class="fromData">
            <h2>Buscar Partes:</h2>
            <div id="filtrosContenedor">
                <input type="text" id="filtroNumeroParte" placeholder="Nº Parte">
                <input type="date" id="filtroFecha" placeholder="Fecha (dd/mm/yyyy)">
                <input type="text" id="filtroNotas" placeholder="Notas">
                <input type="text" id="filtroSeguimiento" placeholder="Seguimiento">
                <input type="text" id="filtroRecogido" placeholder="Recogido (Sí/No)">
                <input type="text" id="filtroCliente" placeholder="Cliente">
                <input type="text" id="filtroEquipo" placeholder="Equipo">
                <input type="text" id="filtroEmpleado" placeholder="Empleado">
                <button type="button" id="btnLimpiarFiltrosParte">Limpiar</button>
                <button type="button" id="btnOrdenarPartes">Ordenar por Nº Parte</button>
            </div>
        </div>
    </section>



    <section id="contenedorpartes">
        <?php

        $clientesPorTelefono = [];
        foreach ($datosUsu as $cliente) {
            $clientesPorTelefono[$cliente->getTelefono()] = $cliente->getNombre() . ' ' . $cliente->getApellidos();
        }

        $empleadosPorDni = [];
        foreach ($datosEmple as $empleado) {
            $empleadosPorDni[$empleado->getDni()] = $empleado->getNombre() . ' ' . $empleado->getApellidos();
        }

        $equiposPorId = [];
        foreach ($datosEqui as $equipo) {
            $equiposPorId[$equipo->getIdEquipo()] = $equipo->getMarca() . ' ' . $equipo->getModelo();
        }


        foreach ($datos as $parte) {
            echo '<div class="fromData">';
            echo '<div class="tabla-responsive">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Número Parte</th>';
            echo '<th>Fecha</th>';
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
            echo '<td>' . $parte->getNumeroParte() . '</td>';
            echo '<td>' . date("d/m/Y", strtotime($parte->getFecha())) . '</td>';
            echo '<td>' . $parte->getNotas() . '</td>';
            echo '<td>' . $parte->getSeguimiento() . '</td>';
            echo '<td>' . ($parte->getRecogido() ? 'Sí' : 'No') . '</td>';
            echo '<td><a href="index.php?c=usuario&a=menuSoloUnRegistro&telefono=' . $parte->getClienteTelefono() . '">' . $parte->getClienteTelefono() . ' - ' . $clientesPorTelefono[$parte->getClienteTelefono()] . '</a></td>';
            echo '<td><a href="index.php?c=equipo&a=menuSoloUnEquipo&id_equipo=' . $parte->getIdEquipo() . '">' . $parte->getIdEquipo() . ' - ' . $equiposPorId[$parte->getIdEquipo()] . '</a></td>';
            echo '<td><a href="index.php?c=empleado&a=menuSoloUnEmpleado&dni=' . $parte->getEmpleadoDni() . '">' . $parte->getEmpleadoDni() . ' - ' . $empleadosPorDni[$parte->getEmpleadoDni()] . '</a></td>';
            echo "<td><button onclick=\"location.href='index.php?c=parte&a=editar&id_parte={$parte->getNumeroParte()}'\">Editar Parte</button></td>";
            echo "<td>
            <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este Parte?')) { 
                window.location.href='index.php?c=parte&a=eliminar&id_parte=" . $parte->getNumeroParte() . "'; 
            }\">
                Eliminar Parte
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