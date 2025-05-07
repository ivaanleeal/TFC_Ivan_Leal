<?php

require_once '../model/ReparacionDAO.php';
require_once '../model/entidades/reparacion.php';
require_once '../model/entidades/parte.php';
require_once '../model/entidades/tarea.php';
require_once '../model/entidades/pieza.php';


class ReparacionController
{

    private $model;

    public function __construct()
    {
        $this->model = new ReparacionDAO();
    }



    public function menuReparacion()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = $this->model->obtenerTodos();
                $datosPartes = $this->model->obtenerPartes();
                $datosTareas = $this->model->obtenerTareas();
                $datosPiezas = $this->model->obtenerPiezas();
                require_once '../view/reparacion/generalConfigReparacion.php';
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
                $datos = [$this->model->obtener($_REQUEST['parte'], $_REQUEST['tarea'])];
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
                $datosPartes = $this->model->obtenerPartes();
                $datosTareas = $this->model->obtenerTareas();
                $datosPiezas = $this->model->obtenerPiezas();
                require_once '../view/reparacion/registroReparacion.php';
            } else {
                require_once '../view/usuario/login.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function registrarReparacion()
    {

        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {

            $parte = $_REQUEST['parte'];
            $tarea = $_REQUEST['tarea'];
            $pieza = $_REQUEST['pieza'];

            $reparacion = new Reparacion();

            $reparacion->setParte($parte);
            $reparacion->setTarea($tarea);
            $reparacion->setPieza($pieza);



            $resultado =  $this->model->registrar($reparacion);

            if ($resultado) {
                header('Location: index.php?c=reparacion&a=menuReparacion');
            } else {
                header('Location: index.php?c=reparacion&a=errorDuplicado');
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
            $reparacion = new Reparacion();

            if (isset($_REQUEST['parte']) && isset($_REQUEST['tarea'])) {
                $datosPartes = $this->model->obtenerPartes();
                $datosTareas = $this->model->obtenerTareas();
                $datosPiezas = $this->model->obtenerPiezas();
                $reparacion = $this->model->obtener($_REQUEST['parte'], $_REQUEST['tarea']);
            }
            require_once '../view/reparacion/reparacion-editar.php';
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

            if (isset($_REQUEST['parte']) && isset($_REQUEST['tarea'])) {

                $resultado = $this->model->eliminarReparacion($_REQUEST['parte'], $_REQUEST['tarea']);

                if ($resultado) {
                    header('Location: index.php?c=reparacion&a=bien');
                } else {
                    header('Location: index.php?c=reparacion&a=error');
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


                $reparacion = new Reparacion();

                $reparacion = $this->model->obtener($_REQUEST['parte'], $_REQUEST['tarea']);

                $reparacion->setParte($_REQUEST['parte']);
                $reparacion->setTarea($_REQUEST['tarea']);
                $reparacion->setPieza($_REQUEST['pieza']);

                $this->model->actualizarReparaciom($reparacion);


                header('Location: index.php?c=reparacion&a=update');
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
            require_once '../view/reparacion/error.php';
        }
        require_once '../view/footer.php';
    }

    public function errorDuplicado()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/reparacion/errorDuplicado.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/reparacion/check.php';
        }
        require_once '../view/footer.php';
    }

    public function update()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/reparacion/update.php';
        }
        require_once '../view/footer.php';
    }
}
