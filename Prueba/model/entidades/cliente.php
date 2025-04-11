<?php

class cliente
{
    private $telefono;
    private $nombre;
    private $apellido;
    private $usuario;
    private $contrasena;
    private $privilegio;
    private $whatsap;
    private $llamar;


    public function __construct($telefono, $nombre, $apellido, $usuario, $contrasena, $privilegio, $whatsap, $llamar)
    {
        $this->telefono = $telefono;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->privilegio = $privilegio;
        $this->whatsap = $whatsap;
        $this->llamar = $llamar;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function getPrivilegio()
    {
        return $this->privilegio;
    }

    public function getWhatsap()
    {
        return $this->whatsap;
    }

    public function getLlamar()
    {
        return $this->llamar;
    }

    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }

    public function setUsuario($usu): void
    {
        $this->usuario = $usu;
    }

    public function setContrasena($contra): void
    {
        $this->contrasena = $contra;
    }

    public function setPrivilegio($privile): void
    {
        $this->privilegio = $privile;
    }

    public function setWhatsap($whatsap): void
    {
        $this->whatsap = $whatsap;
    }

    public function setLlamar($llamar): void
    {
        $this->llamar = $llamar;
    }
}
