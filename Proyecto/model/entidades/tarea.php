<?php
class Tarea
{
    private $numero_parte;
    private $id_tarea;
    private $descripcion;
    private $estado;
    private $tiempo;
    private $imagen;
    private $empleado_dni;

    
    public function getNumeroParte() {
        return $this->numero_parte;
    }

    public function getIdTarea() {
        return $this->id_tarea;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getTiempo() {
        return $this->tiempo;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getEmpleadoDni() {
        return $this->empleado_dni;
    }

    
    public function setNumeroParte($numero_parte) {
        $this->numero_parte = $numero_parte;
    }

    public function setIdTarea($id_tarea) {
        $this->id_tarea = $id_tarea;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setEmpleadoDni($empleado_dni) {
        $this->empleado_dni = $empleado_dni;
    }
}
?>
