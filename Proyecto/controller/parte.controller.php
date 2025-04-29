<?php

require_once '../model/parteDAO.php';
require_once '../model/entidades/parte.php';




class ParteController
{  

    private $model; //Representa las operaciones de BD para el curso.

    public function __construct()
    {
        $this->model = new ParteDAO();
    }



    public function menuParte()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = $this->model->obtenerTodos();
                require_once '../view/parte/generalConfigParte.php';
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
                $datos = $this->model->obtenerTodos();
                require_once '../view/parte/registroParte.php';
            } else {
                require_once '../view/usuario/login.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function registrarParte()
    {

        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {

            $fecha = $_REQUEST['fecha'];
            $notas = $_REQUEST['notas'];
            $seguimiento = $_REQUEST['seguimiento'];
            $recogido = $_REQUEST['recogido'];
            $cliente_telefono = $_REQUEST['cliente_telefono'];
            $equipo = $_REQUEST['equipo'];
            $empleado = $_REQUEST['empleado'];

            $parte = new Empleado();

            $empleado->setDni($fecha);
            $empleado->setNombre($notas);
            $empleado->setApellidos($seguimiento);
            $empleado->setDni($recogido);
            $empleado->setNombre($cliente_telefono);           
            $empleado->setApellidos($equipo);

           

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
