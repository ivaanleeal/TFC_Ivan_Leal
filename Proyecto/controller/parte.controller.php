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
                $datosUsu = $this->model->obtenerUsuarios();
                $datosEqui = $this->model->obtenerPorEquipos();
                $datosEmple = $this->model->obtenerEmpleados();
                require_once '../view/parte/generalConfigParte.php';
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function menuSoloUnParte()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = [$this->model->obtener($_REQUEST['numero_parte'])];
                $datosUsu = $this->model->obtenerUsuarios();
                $datosEqui = $this->model->obtenerPorEquipos();
                $datosEmple = $this->model->obtenerEmpleados();
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
                $datosUsu = $this->model->obtenerUsuarios();
                $datosEqui = $this->model->obtenerPorEquipos();
                $datosEmple = $this->model->obtenerEmpleados();
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

            $parte = new Parte();
           
            $parte->setFecha($fecha);
            $parte->setNotas($notas);
            $parte->setSeguimiento($seguimiento);
            $parte->setRecogido($recogido);
            $parte->setClienteTelefono($cliente_telefono);           
            $parte->setIdEquipo($equipo);
            $parte->setEmpleadoDni($empleado);


           

            $resultado =  $this->model->registrar($parte);

                if ($resultado) {
                    header('Location: index.php?c=parte&a=menuParte');
                } else {
                    header('Location: index.php?c=parte&a=errorDuplicado');
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
            $parte = new parte();

            if (isset($_REQUEST['id_parte'])) {
                $parte = $this->model->obtener($_REQUEST['id_parte']);
                $datosUsu = $this->model->obtenerUsuarios();
                $datosEqui = $this->model->obtenerPorEquipos();
                $datosEmple = $this->model->obtenerEmpleados();
            }
            require_once '../view/parte/parte-editar.php';
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

            if (isset($_REQUEST['id_parte'])) {

                $resultado = $this->model->eliminarparte($_REQUEST['id_parte']);

                if ($resultado) {
                    header('Location: index.php?c=parte&a=bien');
                } else {
                    header('Location: index.php?c=parte&a=error');
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

                $parte = new parte();
                $parte = $this->model->obtener($_REQUEST['id_parte']);
                
               
                $parte->setNumeroParte($_REQUEST['id_parte']);
                $parte->setFecha($_REQUEST['fecha']);
                $parte->setNotas($_REQUEST['notas']);
                $parte->setSeguimiento($_REQUEST['seguimiento']);
                $parte->setRecogido($_REQUEST['recogido']);
                $parte->setClienteTelefono($_REQUEST['cliente_telefono']);           
                $parte->setIdEquipo($_REQUEST['equipo']);
                $parte->setEmpleadoDni($_REQUEST['empleado']);
                

                $this->model->actualizarparte($parte);


                header('Location: index.php?c=parte&a=update');
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
            require_once '../view/parte/error.php';
        }
        require_once '../view/footer.php';
    }

    public function errorDuplicado()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/parte/errorDuplicado.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/parte/check.php';
        }
        require_once '../view/footer.php';
    }

    public function update()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/parte/update.php';
        }
        require_once '../view/footer.php';
    }
}
