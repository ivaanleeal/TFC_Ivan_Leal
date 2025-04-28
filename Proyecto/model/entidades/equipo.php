<?php
class Equipo
{

    private $id_equipo;
    private $marca;
    private $modelo;
    private $so;
    private $cliente_telefono;


    public function getIdEquipo()
    {
        return $this->id_equipo;
    }


    public function getMarca()
    {
        return $this->marca;
    }


    public function getModelo()
    {
        return $this->modelo;
    }


    public function getSO()
    {
        return $this->so;
    }


    public function getClienteTelefono()
    {
        return $this->cliente_telefono;
    }


    public function setIdEquipo($id_equipo)
    {
        $this->id_equipo = $id_equipo;
    }


    public function setMarca($marca)
    {
        $this->marca = $marca;
    }


    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }


    public function setSO($so)
    {
        $this->so = $so;
    }


    public function setClienteTelefono($cliente_telefono)
    {
        $this->cliente_telefono = $cliente_telefono;
    }
}
