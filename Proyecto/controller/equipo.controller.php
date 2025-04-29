<?php

require_once '../model/equipoDAO.php';
require_once '../model/entidades/equipo.php';




class EquipoController
{  

    private $model; //Representa las operaciones de BD para el curso.

    public function __construct()
    {
        $this->model = new EquipoDAO();
    }



    public function menuEquipo()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = $this->model->obtenerTodos();
                require_once '../view/equipo/generalConfigEquipo.php';
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function menuSoloUnEquipo()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = $this->model->obtener($_REQUEST['id_equipo']);
                require_once '../view/equipo/generalConfigEquipo.php';
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
                require_once '../view/equipo/registroEquipo.php';
            } else {
                require_once '../view/usuario/login.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function registrarequipo()
    {

        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {

            $id = $_REQUEST['id_equipo'];
            $marca = $_REQUEST['marca'];
            $modelo = $_REQUEST['modelo'];
            $so = $_REQUEST['so'];
            $cliente = $_REQUEST['cliente_telefono'];

            $equipo = new equipo();

            $equipo->setIdEquipo($id);
            $equipo->setMarca($marca);
            $equipo->setModelo($modelo);
            $equipo->setSO($so);
            $equipo->setClienteTelefono($cliente);
            
            $resultado =  $this->model->registrar($equipo);

                if ($resultado) {
                    header('Location: index.php?c=equipo&a=menuequipo');
                } else {
                    header('Location: index.php?c=equipo&a=errorDuplicado');
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
            $equipo = new equipo();

            if (isset($_REQUEST['id_equipo'])) {
                $datos = $this->model->obtenerTodos();
                $equipo = $this->model->obtener($_REQUEST['id_equipo']);
            }
            require_once '../view/equipo/equipo-editar.php';
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

            if (isset($_REQUEST['id_equipo'])) {

                $resultado = $this->model->eliminarEquipo($_REQUEST['id_equipo']);

                if ($resultado) {
                    header('Location: index.php?c=equipo&a=bien');
                } else {
                    header('Location: index.php?c=equipo&a=error');
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

                $equipo = new equipo();
                $equipo = $this->model->obtener($_REQUEST['id_equipo']);
                
                $equipo->setIdEquipo($_REQUEST['id_equipo']);
                $equipo->setMarca($_REQUEST['marca']);
                $equipo->setModelo($_REQUEST['modelo']);
                $equipo->setSO($_REQUEST['so']);
                $equipo->setClienteTelefono($_REQUEST['cliente_telefono']);

                $this->model->actualizarequipo($equipo);


                header('Location: index.php?c=equipo&a=update');
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
            require_once '../view/equipo/error.php';
        }
        require_once '../view/footer.php';
    }

    public function errorDuplicado()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/equipo/errorDuplicado.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/equipo/check.php';
        }
        require_once '../view/footer.php';
    }


    public function update()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/equipo/update.php';
        }
        require_once '../view/footer.php';
    }

}
