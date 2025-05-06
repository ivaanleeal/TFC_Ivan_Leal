<?php

require_once '../model/piezadoDAO.php';
require_once '../model/entidades/pieza.php';




class PiezaController
{

    private $model; 

    public function __construct()
    {
        $this->model = new PiezadoDAO();
    }



    public function menuPieza()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = $this->model->obtenerTodos();
                require_once '../view/pieza/generalConfigPieza.php';
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function menuSoloUnaPieza()
    {

        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $datos = [$this->model->obtener($_REQUEST['codigo_pieza'])];
                require_once '../view/pieza/generalConfigPieza.php';
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
                require_once '../view/pieza/registroPieza.php';
            } else {
                require_once '../view/usuario/login.php';
            }
        }
        require_once '../view/footer.php';
    }

    public function registrarPieza()
    {

        if (isset($_SESSION['nombreUsu']) && $_SESSION['privilegio'] == 1) {

            $codigo_pieza = $_REQUEST['codigo_pieza'];
            $nombre = $_REQUEST['nombre'];
            $marca = $_REQUEST['marca'];
            $modelo = $_REQUEST['modelo'];

            $pieza = new Pieza();

            $pieza->setCodigoPieza($codigo_pieza);
            $pieza->setNombre($nombre);
            $pieza->setMarca($marca);
            $pieza->setModelo($modelo);



            $resultado =  $this->model->registrar($pieza);

            if ($resultado) {
                header('Location: index.php?c=pieza&a=menuPieza');
            } else {
                header('Location: index.php?c=pieza&a=errorDuplicado');
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
            $pieza = new Pieza();

            if (isset($_REQUEST['codigo_pieza'])) {
                $pieza = $this->model->obtener($_REQUEST['codigo_pieza']);
                require_once '../view/pieza/pieza-editar.php';
                require_once '../view/footer.php';
            }
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

            if (isset($_REQUEST['codigo_pieza'])) {

                $resultado = $this->model->eliminarPieza($_REQUEST['codigo_pieza']);

                if ($resultado) {
                    header('Location: index.php?c=pieza&a=bien');
                } else {
                    header('Location: index.php?c=pieza&a=error');
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

                $pieza = new Pieza();
                $pieza = $this->model->obtener($_REQUEST['codigo_pieza']);

                $pieza->setCodigoPieza($_REQUEST['codigo_pieza']);
                $pieza->setNombre($_REQUEST['nombre']);
                $pieza->setMarca($_REQUEST['marca']);
                $pieza->setModelo($_REQUEST['modelo']);

                $this->model->actualizarPieza($pieza);


                header('Location: index.php?c=pieza&a=update');
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
            require_once '../view/pieza/error.php';
        }
        require_once '../view/footer.php';
    }

    public function errorDuplicado()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/pieza/errorDuplicado.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/pieza/check.php';
        }
        require_once '../view/footer.php';
    }

    public function update()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/pieza/update.php';
        }
        require_once '../view/footer.php';
    }
}
