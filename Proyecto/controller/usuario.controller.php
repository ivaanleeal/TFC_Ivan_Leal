<?php

require_once '../model/usuarioDAO.php';
require_once '../model/entidades/usuario.php';




class UsuarioController
{

    private $model;

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
                $datos = $this->model->obtenerTodos();
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



    public function modificarContra()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 0) {
                $empleado = $this->model->obtener($_SESSION['telefono']);
                require_once '../view/usuario/cambiarContra.php';
            } else {
                require_once '../view/usuario/inicioAdmin.php';
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
                require_once '../view/usuario/inicioUsuario.php';
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


    public function actualizarContra()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 0) {

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

                $this->model->actualizarUsuario($usuario);


                header('Location: index.php?c=usuario&a=updateContra');
            } else {
                require_once '../view/usuario/inicioAdmin.php';
            }
        }
        require_once '../view/footer.php';
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

                $this->model->actualizarUsuario($usuario);


                header('Location: index.php?c=usuario&a=update');
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
        setcookie('usuario', "");

        require_once '../view/usuario/login.php';
        require_once '../view/footer.php';
    }


    public function loginVerificar()
    {
        $usuarioNombre = $_POST['usuario'];
        $contrasena = $_POST['password'];

        $usuario = $this->model->obtenerPorUsuario($usuarioNombre);

        
        if ($usuario && password_verify($contrasena, $usuario->getContrasena())) {
            
            $_SESSION['nombreUsu'] = $usuario->getUsuario();
            $_SESSION['privilegio'] = $usuario->getPrivilegio();
            $_SESSION['telefono'] = $usuario->getTelefono();

            
            if (isset($_POST['recordar'])) {
                setcookie('usuario', $usuarioNombre, time() + (86400 * 30), "/");
            } else {
                setcookie('usuario', '', time() - 3600, "/"); 
            }

            
            if ($usuario->getPrivilegio() == 0) {
                header('Location: index.php?c=Usuario&a=usuarioIniciado');
            } else {
                header('Location: index.php?c=Usuario&a=usuarioIniciadoAdmin');
            }
            exit();
        } else {
            $error = "Usuario o contraseña no coincide";
            require '../view/usuario/login.php';
            require '../view/footer.php';
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
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 0) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/error.php';
        }
        require_once '../view/footer.php';
    }

    public function errorDuplicado()
    {
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 0) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/errorDuplicado.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 0) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/check.php';
        }
        require_once '../view/footer.php';
    }


    public function update()
    {
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 0) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/update.php';
        }
        require_once '../view/footer.php';
    }

    public function updateContra()
    {
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 1) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/usuario/updateContra.php';
        }
        require_once '../view/footer.php';
    }



    public function usuarioHistorial()
    {
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 1) {
            require_once '../view/usuario/login.php';
        } else {
            $datos = $this->model->obtenerReparaciones($_SESSION['telefono']);
            require_once '../view/usuario/historial-Repara.php';
        }
        require_once '../view/footer.php';
    }

    public function usuarioEstadoRepara()
    {
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 1) {
            require_once '../view/usuario/login.php';
        } else {
            $datos = $this->model->obtenerEstado($_SESSION['telefono']);
            require_once '../view/usuario/datosReoaracion.php';
        }
        require_once '../view/footer.php';
    }

    public function usuarioRepara()
    {
        if (!isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] = 1) {
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

        header('Location: index.php');
    }
}
