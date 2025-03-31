<?php
if (!isset($_SESSION["nombreUsu"])) {
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejemplo MVC con entidad y controller</title>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/assets/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="../public/assets/js/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="../public/assets/css/style.css" />

    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>



    <div class="container">

        <div id="navbar" class="navbar-collapse collapse">
            <h2>Usuario:
                <?php
                if (!empty($_SESSION)) {
                    echo  $_SESSION['nombreUsu'];
                } else {
                    echo "Sin registrar";
                }
                ?>

            </h2>
            <ul class="nav navbar-nav ">
                <li class="active"><a href="index.php?c=Alumno">Alumnos</a></li>
                <li><a href="index.php?c=Curso">Cursos</a></li>
                <li><a href="index.php?c=Usuario&a=logout">Salir</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>