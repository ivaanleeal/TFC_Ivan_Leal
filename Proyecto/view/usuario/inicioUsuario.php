<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Reparaciones Informáticas</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>

<body>

    <header class="header_paginas">
        <div class="logo"><a href="./index.php">Reparacions</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../HTML/contacto.php">Contacto</a>
            <a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú</a>
            <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
        </nav>
    </header>

    <section >
        <h1>Hola <?php echo $_SESSION['nombreUsu']; ?> bienbenido de nuevo</h1>
        <div class="enlacesUsu">
            <nav>
                <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
                <br><br>
                <button>Ver estado Reparación en directo</button>
                <br><br>
            </nav>
        </div>
    </section>

    <section class="pruebaMenu">
        <table class="servicios">
            <tr>
                <td colspan="3">
                    <h1>Accede a tus Servicios</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Historiar de reparaciones:</h3>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="infoServiInicio">Aquí podras ver todas las reparaciones de todos tus equipos con toda la información del parte. </p>
                </td>
                <td>
                    <button>Ver historial Reparaciones en directo</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="pruebaMenuDos">
        <table class="servicios">

            <tr>
                <td colspan="2">
                    <h3>Estado de la Rearación:</h3>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="infoServiInicio">Aquí podras ver el estado en el que se encuentra tu equipo a tiempo real "Solo está funcional si tiees una reparación en proceso". </p>
                </td>
                <td>
                    <button>Ver Estado de la Reparación</button>
                </td>
            </tr>
        </table>
    </section>



</body>