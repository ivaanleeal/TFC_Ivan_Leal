<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del Equipo - Reparaciones Informáticas</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>

<body>
    <header class="header_paginas">
        <div class="logo"><a href="../index.html">Reparacions</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>
    <main>
        <section class="formus">
            <form class="fromCon">
                <table>
                    <tr>
                        <td></td>
                        <td><h1>Consulta el Estado de tu Equipo</h1></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="codigo">Introduce tu código:</label>
                        </td>
                        <td>
                            <input type="text" id="codigo" name="codigo" placeholder="Código de reparación" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="tablaBoton"><button type="submit">Consultar</button></td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>

</html>