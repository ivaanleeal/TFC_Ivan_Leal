<?php

require_once '../model/clienteDAO.php';
require_once '../model/entidades/cliente.php';




class ClienteController
{ 
    private $model;

    public function __construct()
    {
        $this->model = new clienteDAO();
    }

    public function index()
    {
        require_once '../view/headerStart.php';
        require_once '../view/usuario/inicio.php';
        require_once '../view/footer.php';
    }

}