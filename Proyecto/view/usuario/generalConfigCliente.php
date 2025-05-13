<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Clientes - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/ordenarDatosUsuario.js" defer></script>
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
        <h1 class="bienvenida">Configuración de Clientes </h1>
        <button onclick="window.history.back()">⬅ Página Anterior</button>
        <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
    </section>

    <section class="botonesOpcciones">
        <button onclick="location.href='index.php?c=usuario&a=iniciarRegistro'">Crear Nuevo Cliente</button>
    </section>

    <section class="botonesOpcciones">
        <h4>Buscar:</h4>
        <table>
            <tr>
                <td><input type="text" id="filtroTelefono" placeholder="Teléfono"></td>
                <td><input type="text" id="filtroNombre" placeholder="Nombre"></td>
                <td><input type="text" id="filtroApellidos" placeholder="Apellidos"></td>                
                <td><input type="text" id="filtroUsuario" placeholder="Usuario"></td>
                <td><input type="text" id="filtroPrivilegio" placeholder="Privilegio"></td>
                <td><input type="text" id="filtroWhatsap" placeholder="WhatsApp"></td>
                <td><input type="text" id="filtroLlamar" placeholder="Llamar"></td>
                <td><button id="btnLimpiarFiltros">Limpiar</button></td>
                <td><button id="btnOrdenarNombres">Ordenar A-Z</button></td>
            </tr>
        </table>
    </section>


    <section id="contenedorClientes">
        <?php

        foreach ($datos as $cliente) {
            echo '<div class="fromData">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Teléfono</th>';
            echo '<th>Nombre</th>';
            echo '<th>Apellidos</th>';
            echo '<th>Nombre usuario</th>';
            echo '<th>Contraseña</th>';
            echo '<th>Privilegio</th>';
            echo '<th>WhatsApp</th>';
            echo '<th>Llamar</th>';
            echo '<th></th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $cliente->getTelefono() . '</td>';
            echo '<td>' . $cliente->getNombre() . '</td>';
            echo '<td>' . $cliente->getApellidos() . '</td>';
            echo '<td>' . $cliente->getUsuario() . '</td>';
            echo '<td>' . $cliente->getContrasena() . '</td>';
            echo '<td>' . ($cliente->getPrivilegio() ? 'Admin' : 'Normal') . '</td>';
            echo '<td>' . ($cliente->getWhatsap() ? 'Sí' : 'No') . '</td>';
            echo '<td>' . ($cliente->getLlamar() ? 'Sí' : 'No') . '</td>';
            echo "<td><button onclick=\"location.href='index.php?c=usuario&a=editar&telefono={$cliente->getTelefono()}'\">Editar Cliente</button></td>";
            echo "<td>
            <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este cliente?')) { 
                window.location.href='index.php?c=usuario&a=eliminar&telefono=" . $cliente->getTelefono() . "'; 
            }\">
                Eliminar Cliente
            </button>
            </td>";
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </section>