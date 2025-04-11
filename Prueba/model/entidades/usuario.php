<?php
class cliente{

    private $usuario;
    private $contrasena;

    public function __construct($usuario, $contrasena) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setUsuario($usu): void {
        $this->usuario = $usu;
    }

    public function setContrasena($contra): void {
        $this->contrasena = $contra;
    }

}