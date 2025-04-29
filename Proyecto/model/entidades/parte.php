<?php

class Parte {
    private $numero_parte;
    private $fecha;
    private $notas;
    private $seguimiento;
    private $recogido;
    private $cliente_telefono;
    private $id_equipo;
    private $empleado_dni;

    
    public function getNumeroParte() {
        return $this->numero_parte;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getNotas() {
        return $this->notas;
    }

    public function getSeguimiento() {
        return $this->seguimiento;
    }

    public function getRecogido() {
        return $this->recogido;
    }

    public function getClienteTelefono() {
        return $this->cliente_telefono;
    }

    public function getIdEquipo() {
        return $this->id_equipo;
    }

    public function getEmpleadoDni() {
        return $this->empleado_dni;
    }

    
    public function setNumeroParte($numero_parte) {
        $this->numero_parte = $numero_parte;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setNotas($notas) {
        $this->notas = $notas;
    }

    public function setSeguimiento($seguimiento) {
        $this->seguimiento = $seguimiento;
    }

    public function setRecogido($recogido) {
        $this->recogido = $recogido;
    }

    public function setClienteTelefono($cliente_telefono) {
        $this->cliente_telefono = $cliente_telefono;
    }

    public function setIdEquipo($id_equipo) {
        $this->id_equipo = $id_equipo;
    }

    public function setEmpleadoDni($empleado_dni) {
        $this->empleado_dni = $empleado_dni;
    }
}
