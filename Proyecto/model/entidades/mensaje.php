<?php

class mensaje {
    private $id;
    private $Nombre;
    private $Apellidos;
    private $Correo;
    private $Mensaje;
    private $Visto;

    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    
    public function getNombre() {
        return $this->Nombre;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }


    public function getApellidos() {
        return $this->Apellidos;
    }

    public function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }


    public function getCorreo() {
        return $this->Correo;
    }

    public function setCorreo($Correo) {
        $this->Correo = $Correo;
    }


    public function getMensaje() {
        return $this->Mensaje;
    }

    public function setMensaje($Mensaje) {
        $this->Mensaje = $Mensaje;
    }

    public function getleido() {
        return $this->Visto; 
    }
    

    public function setleido($visto) {
        $this->Visto = $visto;
    }
}
