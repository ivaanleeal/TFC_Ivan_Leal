<?php

class Pieza
{
    private $codigo_pieza;
    private $nombre;
    private $marca;
    private $modelo;

   

    public function getCodigoPieza()
    {
        return $this->codigo_pieza;
    }

    public function setCodigoPieza($codigo_pieza)
    {
        $this->codigo_pieza = $codigo_pieza;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
}
