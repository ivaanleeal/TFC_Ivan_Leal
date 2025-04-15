<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Reparaciones Informáticas</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <script src="../JS/validaForm.js" defer></script>
</head>

<body>
    <section class="inicio">
        <header class="header_paginas">
            <div class="logo"><a href="./index.php">Reparacions</a></div>
            <nav>
                <a href="../public/index.php">Inicio</a>
                <a href="../HTML/contacto.php">Contacto</a>
                <?php
                if (isset($_SESSION['nombreUsu'])) {
                ?>
                    <a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú</a>
                <?php
                }

                if (!isset($_SESSION['nombreUsu'])) {
                ?>
                    <a href="../public/index.php?c=usuario&a=login">Iniciar Sesión</a>
                <?php
                }
                
                if (isset($_SESSION['nombreUsu'])) {
                ?>
                    <a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a>
                <?php
                }
                ?>
                
            </nav>
        </header>

        <table class="servicios">
            <tr>
                <td colspan="2">
                    <h1 class="bienTPCSI">Bienvenidos a TPCSI</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Somos una empresa con más de 20 años de experiencia en este sector, somos expertos en la reparación y venta de gran
                        variedad de equipos informáticos e instalación y mantenimiento de redes informáticas.</p>
                    <p> Tu equipo está en las mejores manos, hacemos presupuesto gratis sin compromiso.</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Nuestros Servicios:</h3>
                </td>
            </tr>
            <tr>
                <td><button onclick="location.href='index.php#parteInformaticos'">Servicios Informáticos</button></td>
            </tr>
            <tr>
                <td><button onclick="location.href='index.php#parteTecnicos'">Servicios Técnicos</button></td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Nuestro Horario:</h3>
                    <p>_________________________________</p>
                    De Lunes a Viernes:<p>Mañanas: 9:00-14:00 | Tardes: 16:00-20:00</p>
                    <p>_________________________________</p>
                </td>
            </tr>
        </table>
        <br><br>
    </section>

    <section class="prueba" id="parteInformaticos">
        <table class="servicios">
            <tr>
                <td colspan="2">
                    <h1>Servicios Informáticos</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Vendemos todo tipo de equipos informáticos tanto para empresas como particulares.</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Principales servicios:</h3>
                </td>
            </tr>
            <tr>
                <td>Puestos de Trabajo</td>
                <td>Servidores</td>
            </tr>
            <tr>
                <td>Sistemas de Almacenamiento</td>
                <td>Monitores</td>
            </tr>
            <tr>
                <td>Redes</td>
                <td>Impresoras</td>
            </tr>
            <tr>
                <td>SAIS</td>
                <td>Portátiles</td>
            </tr>
        </table>
        <br><br>
    </section>

    <section class="prueba2" id="parteTecnicos">
        <table class="servicios">
            <tr>
                <td colspan="2">
                    <h1>Servicios Técnicos</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Reparamos todo tipo de equipos informáticos tanto para empresas como particulares.</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Principales servicios de reparación:</h3>
                </td>
            </tr>
            <tr>
                <td>Equipos de Torre</td>
                <td>Servidores</td>
            </tr>
            <tr>
                <td>Clonaciones de Datos</td>
                <td>Portátiles</td>
            </tr>
            <tr>
                <td>Redes</td>
                <td>Impresoras</td>
            </tr>
            <tr>
                <td>Mejoras a Equipos</td>
                <td>Mantenimientos de Sistemas</td>
            </tr>
        </table>
        <br><br>
    </section>



    <section class="PrinciContacto">
        <h1>Contáctanos</h1>
        <div class="contact">
            <form>
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
                        <td colspan="2" class="tablaBoton"><button type="submit" id="enviar">Enviar</button></td>
                    </tr>
                </table>

            </form>
        </div>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4091.442621612986!2d-8.417177824191134!3d43.36811316969304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2e7c6088be9da5%3A0xb9abca402d843d86!2sEstadio%20Municipal%20de%20Riazor!5e1!3m2!1ses!2ses!4v1732274919186!5m2!1ses!2ses"
            width="30%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>


    </section>

    <?php
    require_once "../view/footer.php";
    ?>



</body>

</html>