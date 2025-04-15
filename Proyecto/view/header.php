<?php
/*if (!isset($_SESSION["nombreUsu"])) {
    header('Location:index.php');
}*/

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon"
        href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj"
        type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <script src="../JS/validaForm.js" defer></script>

</head>

<body>

    <header>
        <div class="logo"><a href="./index.php">TPCSI</a></div>
        <nav>
            <a href="./index.php">Inicio</a>
            <a href="../public/index.php?c=usuario&a=usuarioContacto">Contacto</a>
            <?php
            if(isset($_SESSION['nombreUsu'])&& $_SESSION['nombreUsu']!=""){
            echo "<a href='index.php?c=usuario&a=usuarioIniciado'>Menú</a>";
            }
            ?>
            <a href="index.php?c=usuario&a=login">Iniciar Sesión</a>
        </nav>
    </header>