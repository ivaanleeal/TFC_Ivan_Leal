<?php

require_once '../model/tareaDAO.php';
require_once '../model/entidades/tarea.php';




class TareaController
{

    private $model; //Representa las operaciones de BD para el curso.

    public function __construct()
    {
        $this->model = new TareaDAO();
    }



    public function menuTarea()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = $this->model->obtenerTodos();
                $datosEmple = $this->model->obtenerEmpleados();
                require_once '../view/tarea/generalConfigTarea.php';
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function menuSoloUnaTarea()
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
                $datosEmple = $this->model->obtenerEmpleados();
                $datosParte = $this->model->obtenerPartes();
                require_once '../view/tarea/registroTarea.php';
            } else {
                require_once '../view/usuario/login.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function registrarTarea()
    {

        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {

            $parte = $_REQUEST['parte'];
            $descripccion = $_REQUEST['descripccion'];
            $estado = $_REQUEST['estado'];
            $tiempo = $_REQUEST['tiempo'];
            $empleado = $_REQUEST['empleado'];

            $imagen = $_FILES['imagen']['name'];
            $rutaTemp = $_FILES['imagen']['tmp_name'];
            $rutaDestino = "../imagenesSubidas/" . $imagen;
            move_uploaded_file($rutaTemp, $rutaDestino);
            $imagenBien = "..\\imagenesSubidas\\$imagen";

            $ultimoId = $this->model->obtenerUltimoIdTarea($parte);
            $nuevoId = $ultimoId !== null ? $ultimoId + 1 : 1;

            $tarea = new Tarea();

            $tarea->setNumeroParte($parte);
            $tarea->setIdTarea($nuevoId);
            $tarea->setDescripcion($descripccion);
            $tarea->setEstado($estado);
            $tarea->setTiempo($tiempo);
            $tarea->setImagen($imagenBien);
            $tarea->setEmpleadoDni($empleado);



            $resultado =  $this->model->registrar($tarea);

            if ($resultado) {
                header('Location: index.php?c=tarea&a=menutarea');
            } else {
                header('Location: index.php?c=tarea&a=errorDuplicado');
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
            $tarea = new tarea();

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
