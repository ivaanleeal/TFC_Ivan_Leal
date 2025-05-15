<?php

require_once '../model/contactoDAO.php';
require_once '../model/entidades/contacto.php';




class ContactoController
{ 

    private $model; 

    public function __construct()
    {
        $this->model = new UsuarioDAO();
    }

   

    public function registrar()
    {
       
        
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellido'];
        $email = $_REQUEST['email'];
        $texto = $_REQUEST['mensaje'];

        $mensaje = new contacto();

        $mensaje->setNombre($nombre);
        $mensaje->setApellidos($apellidos);
        $mensaje->setCorreo($email);
        $mensaje->setMensaje($texto);

        $this->model->registrarMensaje($mensaje);

        header('Location: index.php?c=usuario&a=usuarioContacto');
    }
   
    
    
}
