<?php

class WebController
{

    public function index()
    {
        require_once '../view/headerStart.php';
        require_once '../view/HTML/inicio.html';
        require_once '../view/footer.php';
    }

    public function contacto()
    {
        require_once '../view/headerStart.php';
        require_once '../view/HTML/contacto.html';
        require_once '../view/footer.php';
    }
}
