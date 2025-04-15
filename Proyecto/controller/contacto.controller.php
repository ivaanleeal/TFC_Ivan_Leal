<?php

require_once '../model/contactoDAO.php';
require_once '../model/entidades/contacto.php';




class ContactoController
{  //PENDIENTE DE PONER LAS VISTAS

    private $model; //Representa las operaciones de BD para el curso.

    public function __construct()
    {
        $this->model = new UsuarioDAO();
    }

   /*public function iniciarRegistro()
    {
        require_once '../HTML/contacto.php';
    }*/

    public function registrar()
    {
        //Después de la validación
        
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellido'];
        $email = $_REQUEST['email'];
        $texto = $_REQUEST['mensaje'];

        $mensaje = new contacto();

        $mensaje->setNombre($nombre);
        $mensaje->setApellidos($apellidos);
        $mensaje->setCorreo($email);
        $mensaje->setMensaje($texto);

        $this->model->registrarMensaje($mensaje);

        header('Location: index.php?c=usuario&a=usuarioContacto');
    }

    public function editar()
    {
        $usuario = new Usuario();

        if (isset($_REQUEST['id'])) {
            $usuario = $this->model->obtener($_REQUEST['id']);
        }

        require_once '../view/usuario/usuario-editar.php';
        require_once '../view/footer.php';
    }

    public function login()
    {
        $_SESSION['nombreUsu'] = "";
        $_SESSION['privilegio'] = "";

        require_once '../view/usuario/login.php';
        require_once '../view/footer.php';
    }


    public function loginVerificar()
    {

        $usuarioNombre = $_REQUEST['usuario'];
        $contrasena = $_REQUEST['password'];

        $errores = [];





        $usuario = $this->model->obtenerPorUsuario($usuarioNombre);
        if ($usuario != null) {
            if (password_verify($contrasena, $usuario->getContrasena()) && $usuario != null) {

                $_SESSION['nombreUsu'] = $usuario->getUsuario();
                $_SESSION['privilegio'] = $usuario->getPrivilegio();

                header('Location: index.php?c=Usuario&a=usuarioIniciado');
            } else {

                $errores[] = "Usuario o Contraseña mal escritos";

                require_once '../view/usuario/login.php';
                foreach ($errores as $error) {
                    echo "<p style='color: red;'>" . $error . "</p>";
                }
                require_once '../view/footer.php';
            }
        } else {
            require_once '../view/usuario/login.php';
            $errores[] = "Usuario o Contraseña mal escritos";
            foreach ($errores as $error) {
                echo "<p style='color: red;'>" . $error . "</p>";
            }
            require_once '../view/footer.php';
        }
    }

    public function usuarioIniciado()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/inicioUsuario.php';
        }
        require_once '../view/footer.php';
    }

    

    
}
