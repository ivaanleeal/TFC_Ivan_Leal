<?php

require_once '../model/usuarioDAO.php';
require_once '../model/entidades/usuario.php';




class UsuarioController
{  //PENDIENTE DE PONER LAS VISTAS

    private $model; //Representa las operaciones de BD para el curso.

    public function __construct()
    {
        $this->model = new UsuarioDAO();
    }

    /*public function index()
    {
        require_once '../view/headerStart.php';
        require_once '../view/usuario/inicio.php';
        require_once '../view/footer.php';
    }*/

    /*public function iniciarRegistro()
    {
        require_once '../view/headerStart.php';
        require_once '../view/usuario/registro.php';
        require_once '../view/footer.php';
    }*/

    public function registrar()
    {
        //Después de la validación
        $telefono = $_REQUEST['telefono'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $usuarioNombre = $_REQUEST['usuario'];
        $password = $_REQUEST['password'];
        $privilegio = 2;
        $whatsap = $_REQUEST['whatsap'];
        $setLlamar = $_REQUEST['llamar'];

        $usuario = new Usuario();

        $usuario->setTelefono($telefono);
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setUsuario($usuarioNombre);
        $usuario->setContrasena($password);
        $usuario->setPrivilegio($privilegio);
        $usuario->setWhatsap($whatsap);
        $usuario->setLlamar($setLlamar);

        $this->model->registrar($usuario);

        header('Location: index.php?c=usuario');
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
                $_SESSION['telefono'] = $usuario->getTelefono();

                if ($usuario->getPrivilegio() == 0) {
                    header('Location: index.php?c=Usuario&a=usuarioIniciado');
                } else {
                    header('Location: index.php?c=Usuario&a=usuarioIniciadoAdmin');
                }
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

    public function usuarioIniciadoAdmin()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/inicioAdmin.php';
        }
        require_once '../view/footer.php';
    }

    public function usuarioHistorial()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            $datos = $this->model->obtenerReparaciones($_SESSION['telefono']);
            require_once '../view/usuario/historial-Repara.php';
        }
        require_once '../view/footer.php';
    }

    public function usuarioEstadoRepara()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            $datos = $this->model->obtenerEstado($_SESSION['telefono']);
            require_once '../view/usuario/datosReoaracion.php';
        }
        require_once '../view/footer.php';
    }

    public function usuarioRepara()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/estado-Repara.php';
        }
        require_once '../view/footer.php';
    }

    public function usuarioContacto()
    {
        require_once '../HTML/contacto.php';
        require_once '../view/footer.php';
    }


    public function logout()
    {

        session_destroy();
        $_SESSION = array();

        //header('Location: index.php?c=Usuario&a=login');// Preguntar

        header('Location: index.php');
    }
}
