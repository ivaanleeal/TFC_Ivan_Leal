<?php
class Usuario
{
    private $telefono;
    private $nombre;
    private $apellidos;
    private $usuario;
    private $contrasena;
    private $privilegio;
    private $whatsap;
    private $llamar;

    
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
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

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    public function setContrasena($contrasena): void
    {
        $this->contrasena = $contrasena;
    }

    public function setPrivilegio($privilegio): void
    {
        $this->privilegio = $privilegio;
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
