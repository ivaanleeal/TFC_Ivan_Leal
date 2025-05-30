<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - TPCSI</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <script src="../JS/validaForm.js" defer></script>
</head>

<body>
    <header class="header_paginas">
        <div class="logo"><a href="../public/index.php">TPCSI</a></div>
        <nav>
            <a href="../public/index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <?php
            if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 0) {
            ?>
                <td><a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú Usuario</a></td>
                <td><a href="../public/index.php?c=usuario&a=modificarContra">Configurar Cuenta</a></td>
                </tr>
                <tr>
                <?php
            }
            if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {
                ?>
                    <td><a href="../public/index.php?c=usuario&a=usuarioIniciadoAdmin">Menú Admin</a></td>
                <?php
            }

            if (!isset($_SESSION['nombreUsu']) || $_SESSION['nombreUsu'] == "") {
                ?>
                    <a href="../public/index.php?c=usuario&a=login">Iniciar Sesión</a>
                <?php
            }

            if (isset($_SESSION['nombreUsu']) && $_SESSION['nombreUsu'] != "") {
                ?>
                    <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
                <?php
            }
                ?>

        </nav>
    </header>
    <main>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4091.442621612986!2d-8.417177824191134!3d43.36811316969304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2e7c6088be9da5%3A0xb9abca402d843d86!2sEstadio%20Municipal%20de%20Riazor!5e1!3m2!1ses!2ses!4v1732274919186!5m2!1ses!2ses"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <section class="formus">
            <h1>Contáctanos</h1>
            <form class="fromCon" method="post" action="index.php?c=contacto&a=registrar">
                <table>
                    <tr>
                        <td><label for="nombre">Nombre:</label></td>
                        <td> <input type="text" id="nombre" name="nombre" placeholder="Ej. Jose" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <p id="errornombre"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="apellidos">Apellidos:</label></td>
                        <td> <input type="text" id="apellido" name="apellido" placeholder="Ej. Rodríguez López"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <p id="errorapellido"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Correo Electrónico:</label></td>
                        <td><input type="email" id="email" name="email" placeholder="Ej. Jose@gmail.com" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <p id="erroremail"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="mensaje">Mensaje:</label></td>
                        <td><textarea id="mensaje" name="mensaje" rows="4" required
                                placeholder="Escribe tu texto..."></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <p id="erroretexto"></p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="tablaBoton"><button type="submit" id="enviar">Enviar</button></td>
                        <td></td>
                    </tr>
                </table>
            </form>
            <br>
        </section>
    </main>
    <?php
    require_once "../view/footer.php";
    ?>
</body>

</html>