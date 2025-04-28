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



    public function menuRegistro()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos= $this->model->obtenerTodos();
                require_once '../view/usuario/generalConfigCliente.php';

            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function menuSoloUnRegistro()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = [$this->model->obtener($_REQUEST['telefono'])];
                require_once '../view/usuario/generalConfigCliente.php';

            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }


    public function iniciarRegistro()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                require_once '../view/usuario/registroUsuario.php';
            } else {
                require_once '../view/usuario/login.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function registrarUsuario()
    {

        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {

            $telefono = $_REQUEST['telefono'];
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];
            $usuarioNombre = $_REQUEST['usuario'];
            $password = $_REQUEST['password'];
            $privilegio = $_REQUEST['privilegio'];

            $usuario = new Usuario();

            $usuario->setTelefono($telefono);
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setUsuario($usuarioNombre);
            $usuario->setContrasena($password);
            $usuario->setPrivilegio($privilegio);
            $usuario->setWhatsap(isset($_REQUEST['whatsap']) ? 1 : 0);
            $usuario->setLlamar(isset($_REQUEST['llamada']) ? 1 : 0);

            $resultado =  $this->model->registrar($usuario);

            if ($resultado) {
                header('Location: index.php?c=Usuario&a=menuRegistro');
            } else {
                header('Location: index.php?c=Usuario&a=errorDuplicado');
            }

        } else {
            if (isset($_SESSION['nombreUsu'])) {
                header('Location: index.php?c=Usuario&a=usuarioIniciado');
            } else {
                header('Location: index.php?c=Usuario&a=login');
            }
        }
    }

    public function editar()
    {
        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {
            $usuario = new Usuario();

            if (isset($_REQUEST['telefono'])) {
                $usuario = $this->model->obtener($_REQUEST['telefono']);
            }

            require_once '../view/usuario/usuario-editar.php';
            require_once '../view/footer.php';
        } else {
            if (isset($_SESSION['nombreUsu'])) {
                header('Location: index.php?c=Usuario&a=usuarioIniciado');
            } else {
                header('Location: index.php?c=Usuario&a=login');
            }
        }
    }


    public function eliminar()
    {
        if ($_SESSION['privilegio'] == 1) {

            if (isset($_REQUEST['telefono'])) {

                $resultado = $this->model->eliminarUsuario($_REQUEST['telefono']);

                if ($resultado) {
                    header('Location: index.php?c=Usuario&a=bien');
                } else {
                    header('Location: index.php?c=Usuario&a=error');
                }
            }
        } else {
            if (isset($_SESSION['nombreUsu'])) {
                header('Location: index.php?c=Usuario&a=usuarioIniciado');
            } else {
                header('Location: index.php?c=Usuario&a=login');
            }
        }
    }

    public function actualizar()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {

                $opciones = ['cost' => 12,];

                $usuario = new Usuario();

                $usuario = $this->model->obtener($_REQUEST['telefono']);

                $usuario->setTelefono($_REQUEST['telefono']);
                $usuario->setNombre($_REQUEST['nombre']);
                $usuario->setApellidos($_REQUEST['apellidos']);
                $usuario->setUsuario($_REQUEST['usuario']);
                $usuario->setContrasena(password_hash($_REQUEST['contrasena'], PASSWORD_BCRYPT, $opciones));
                $usuario->setPrivilegio($_REQUEST['privilegio']);
                $usuario->setWhatsap(isset($_REQUEST['whatsap']) ? 1 : 0);
                $usuario->setLlamar(isset($_REQUEST['llamada']) ? 1 : 0);

                $this->model->actualizarCurso($usuario);


                header('Location: index.php?c=usuario&a=editar&telefono=' . $_REQUEST['telefono']);
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
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


    public function error()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/error.php';
        }
        require_once '../view/footer.php';
    }

    public function errorDuplicado()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/errorDuplicado.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/check.php';
        }
        require_once '../view/footer.php';
    }


    public function AdminListaClientes()
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
