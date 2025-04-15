<section class="foot">
    <p>&copy; 2025 TPCSI - Todos los derechos reservados.</p><br />
    <table class="tableFoot">
        <tr>
            <td><a href="../public/index.php">Inicio</a></td>
            <td><a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a></td>
            <?php
            if (isset($_SESSION['nombreUsu'])) {
            ?>
                <td><a href="../public/index.php?c=usuario&a=usuarioIniciado">Menú</a></td>
        </tr>
        <tr>
        <?php
            }

            if (!isset($_SESSION['nombreUsu'])) {
        ?>
            <td><a href="../public/index.php?c=usuario&a=login">Iniciar Sesión</a></td>
        <?php
            }

            if (isset($_SESSION['nombreUsu'])) {
        ?>
            <td><a href="../public/index.php?c=usuario&a=logout">Cerrar Sesión</a></td>
        <?php
            }
        ?>

    </table>
</section>
</body>

</html>