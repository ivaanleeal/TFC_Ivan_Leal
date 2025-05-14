<?php

require_once '../model/empleadoDAO.php';
require_once '../model/entidades/empleado.php';




class EmpleadoController
{  

    private $model; 

    public function __construct()
    {
        $this->model = new EmpleadoDAO();
    }



    public function menuEmpleado()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = $this->model->obtenerTodos();
                require_once '../view/empleado/generalConfigEmpleado.php';
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function menuSoloUnEmpleado()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = [$this->model->obtener($_REQUEST['dni'])];
                require_once '../view/empleado/generalConfigEmpleado.php';
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
                require_once '../view/empleado/registroEmpleado.php';
            } else {
                require_once '../view/usuario/login.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function registrarEmpleado()
    {

        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {

            $dni = $_REQUEST['dni'];
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];

            $empleado = new Empleado();

            $empleado->setDni($dni);
            $empleado->setNombre($nombre);
            $empleado->setApellidos($apellidos);

           

            $resultado =  $this->model->registrar($empleado);

                if ($resultado) {
                    header('Location: index.php?c=empleado&a=menuEmpleado');
                } else {
                    header('Location: index.php?c=empleado&a=errorDuplicado');
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
            $empleado = new Empleado();

            if (isset($_REQUEST['dni'])) {
                $empleado = $this->model->obtener($_REQUEST['dni']);
            }
            require_once '../view/empleado/empleado-editar.php';
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

            if (isset($_REQUEST['dni'])) {

                $resultado = $this->model->eliminarEmpleado($_REQUEST['dni']);

                if ($resultado) {
                    header('Location: index.php?c=empleado&a=bien');
                } else {
                    header('Location: index.php?c=empleado&a=error');
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

                $empleado = new Empleado();
                $empleado = $this->model->obtener($_REQUEST['dni']);
                
                $empleado->setDni($_REQUEST['dni']);
                $empleado->setNombre($_REQUEST['nombre']);
                $empleado->setApellidos($_REQUEST['apellidos']);

                $this->model->actualizarEmpleado($empleado);


                header('Location: index.php?c=empleado&a=update');
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }


    public function error()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/empleado/error.php';
        }
        require_once '../view/footer.php';
    }

    public function errorDuplicado()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/empleado/errorDuplicado.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/empleado/check.php';
        }
        require_once '../view/footer.php';
    }

    public function update()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/empleado/update.php';
        }
        require_once '../view/footer.php';
    }
}
