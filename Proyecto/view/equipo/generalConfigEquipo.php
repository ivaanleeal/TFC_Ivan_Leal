<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Equipos - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/ordenarEquipos.js" defer></script>
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
        <h1 class="bienvenida">Configuración de Equipos </h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=usuarioIniciadoAdmin'">Menú Admin</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'" class="cerrar">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <button onclick="location.href='index.php?c=equipo&a=iniciarRegistro'">Crear Nuevo Equipo</button>
    </section>

    <section class="botonesOpcciones">
        <div class="fromData">
            <h2>Buscar:</h2>
            <div id="filtrosContenedor">
                <input type="text" id="filtroCodigo" placeholder="Código de Equipo">
                <input type="text" id="filtroMarca" placeholder="Marca">
                <input type="text" id="filtroModelo" placeholder="Modelo">
                <input type="text" id="filtroSO" placeholder="Sistema Operativo">
                <input type="text" id="filtroCliente" placeholder="Teléfono o Nombre Cliente">
                <button type="button" id="btnLimpiarFiltros">Limpiar</button>
            </div>
        </div>
    </section>



    <section id="contenedorEquipos">
        <?php

        $clientesPorTelefono = [];
        foreach ($datosUsu as $cliente) {
            $clientesPorTelefono[$cliente->getTelefono()] = $cliente->getNombre() . ' ' . $cliente->getApellidos();
        }

        foreach ($datos as $equipo) {
            echo '<div class="fromData">';
            echo '<h2>Código Equipo: ' . $equipo->getIdEquipo() . '</h2>';
            echo '<div class="tabla-responsive">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Marca</th>';
            echo '<th>Modelo</th>';
            echo '<th>Sistema Operativo</th>';
            echo '<th>Cliente</th>';
            echo '<th></th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $equipo->getMarca() . '</td>';
            echo '<td>' . $equipo->getModelo() . '</td>';
            echo '<td>' . $equipo->getSO() . '</td>';
            echo '<td><a href="index.php?c=usuario&a=menuSoloUnRegistro&telefono=' . $equipo->getClienteTelefono() . '">' . $equipo->getClienteTelefono() . ' - ' . $clientesPorTelefono[$equipo->getClienteTelefono()] . '</a></td>';
            echo "<td><button onclick=\"location.href='index.php?c=equipo&a=editar&id_equipo={$equipo->getIdEquipo()}'\">Editar Equipo</button></td>";
            echo "<td>
            <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este Equipo?')) { 
                window.location.href='index.php?c=equipo&a=eliminar&id_equipo=" . $equipo->getIdEquipo() . "'; 
            }\">
                Eliminar Equipo
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