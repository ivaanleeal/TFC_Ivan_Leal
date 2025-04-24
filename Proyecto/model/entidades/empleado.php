<?php
class Empleado {
    
    private $dni;
    private $nombre;
    private $apellido;
    

    public function getDni() {
        return $this->dni;
    }

    
    public function getNombre() {
        return $this->nombre;
    }

    
    public function getApellidos() {
        return $this->apellido;
    }

    
   
    public function setDni($dni) {
        $this->dni = $dni;
    }

   
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    
    public function setApellidos($apellido) {
        $this->apellido = $apellido;
    }
}