<?php

require_once '../model/mensajeDAO.php';
require_once '../model/entidades/mensaje.php';




class MensajeController
{  

    private $model; 
    public function __construct()
    {
        $this->model = new MensajeDAO();
    }


    public function menuMensajes()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            if ($_SESSION['privilegio'] == 1) {
                $mensajes = $this->model->obtenerTodos();
                require_once '../view/mensaje/generalConfigMensaje.php';
            } else {
                require_once '../view/usuario/inicioUsuario.php';
            }
        }
        require_once '../view/footer.php';
    }


    public function actualizarVisto()
    {
        header('Content-Type: application/json');

        $id = $_POST['id'] ?? null;
        $visto = $_POST['visto'] ?? 0;

        if ($id !== null) {
            $dao = new MensajeDAO();
            $success = $dao->actualizarVistoPorId($id, $visto);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false, 'error' => 'ID no recibido']);
        }
        exit;
    }

    public function eliminar()
    {
        if ($_SESSION['privilegio'] == 1) {

            if (isset($_REQUEST['id'])) {

                $resultado = $this->model->eliminarMensaje($_REQUEST['id']);

                if ($resultado) {
                    header('Location: index.php?c=mensaje&a=bien');
                } else {
                    header('Location: index.php?c=mensaje&a=error');
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


    public function error()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/mensaje/error.php';
        }
        require_once '../view/footer.php';
    }

    public function bien()
    {
        if (!isset($_SESSION['nombreUsu'])) {
            require_once '../view/usuario/login.php';
        } else {
            require_once '../view/mensaje/check.php';
        }
        require_once '../view/footer.php';
    }


}
