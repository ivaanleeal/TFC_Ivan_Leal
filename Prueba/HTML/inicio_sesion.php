<?php

if (!empty($_POST)) {
    // Obtener los datos del formulario y limpiarlos
    $user = isset($_POST['user']) ? htmlspecialchars(trim(strip_tags($_POST['user']))) : '';
    $password = isset($_POST['password']) ? htmlspecialchars(trim(strip_tags($_POST['password']))) : '';
    $db_host = "sql309.infinityfree.com";
    $db_name = "if0_38148262_tpcsi";
    

    // Validación de los campos
    $msjErrores = "";
    $validacionOK = true;

    if (empty($user)) {
        $msjErrores .= "El campo usuario no puede estar vacío. ";
        $validacionOK = false;
    } elseif (!preg_match('/^[A-Za-z0-9_\-@]{1,32}$/', $user)) {
        $msjErrores .= "El campo usuario mal escrito. ";
        $validacionOK = false;
    }

    if (empty($password)) {
        $msjErrores .= "El campo contraseña no puede estar vacío. ";
        $validacionOK = false;
    } elseif (!preg_match('/^[A-Za-z0-9!@#_\-]{10,}$/', $password)) {
        $msjErrores .= "El campo contraseña mal escrito. ";
        $validacionOK = false;
    }

    if ($validacionOK) {
        try {
            $conexion = new mysqli($db_host, $user, $password, $db_name);
            echo"<pre>";
            print_r($conexion);
            echo"</pre>";

            

            /*$query = "SELECT * FROM Clientes";
                $resultado = $conexion->query($query);
                while ($fila = $resultado->fetch_assoc()) {

                  echo"<pre>";
                    print_r($fila);
                  echo"</pre>";
                    
                }*/


            if ($conexion->connect_error) {
                throw new mysqli_sql_exception("Error de conexión: " . $conexion->connect_error);
            }
            $conexion->close();            
        } catch (mysqli_sql_exception $e) {
            echo "Error de MySQL: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error desconocido: " . $e->getMessage();
        }
    } else {
        echo $msjErrores;
    }



   

}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Informáticos</title>
    <link rel="icon" href="https://yt3.ggpht.com/ssGR_sKs0gRpkLzFhxUig46rmwq73x6PzDsmaQh_Mu6jYG8SRsfSciptLPqMudHZpYQQRfOR=s108-c-k-c0x00ffffff-no-rj"
        type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="../Estilos/inicio_sesion.css">
</head>

<body>
    <header class="header_paginas">
        <div class="logo"><a href="../index.html">TPCSI</a></div>
        <nav>
            <a href="../index.html">Inicio</a>
            <a href="Servicios_Informáticos.html">Servicios Informáticos</a>
            <a href="Servicios_Tecnicos.html">Servicios Técnicos</a>
            <a href="estado.html">Estado del Equipo</a>
            <a href="contacto.html">Contacto</a>
            <a href="inicio_sesion.php">Iniciar Sesión</a>
        </nav>
    </header>

    <section class="fromInicioSesion">
        <div>
            <h2 class="clientes">Accede a tu Área</h2>
            <form class="contenidoForm" method="post">
                Nombre Usuario
                <input type="text" name="user" placeholder="Escriba su nombre de Usuario" class="input-estilo"><br />
                <p id="errorDni"></p>
                <br /><br />

                Contraseña Usuario
                <input type="password" name="password" placeholder="Escriba su Contraseña" class="input-estilo"><br />
                <p id="errorDni"></p>
                <br /><br />


                <label for="recordar">Recordar</label>
                <input type="checkbox" id="recordar" checked>

                <button class="boton" id="enviar" type="submit">Entrar</button>

            </form>
        </div>

    </section>

    <section class="foot">
        <p>&copy; 2025 TPCSI - Todos los derechos reservados.</p>
        <br />
        <table class="tableFoot">
            <tr>
                <td><a href="../index.html">Página Principal</a></td>
                <td><a href="./Servicios_Informáticos.html">Servicios Informáticos</a></td>
            </tr>
            <tr>
                <td><a href="Servicios_Tecnicos.html">Servicios Técnicos</a></td>
                <td><a href="./estado.html">Estado Reparación</a></td>
            </tr>
            <tr>
                <td><a href="./contacto.html">Contacto</a></td>
                <td><a href="inicio_sesion.php">Iniciar Sesión</a></td>
            </tr>
        </table>
    </section>
</body>

</html>
