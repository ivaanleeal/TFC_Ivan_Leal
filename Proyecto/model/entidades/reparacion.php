<?php

class Reparacion
{
    private int $parte;
    private int $tarea;
    private string $pieza;

   
    public function getParte(): int
    {
        return $this->parte;
    }

    public function setParte(int $parte): void
    {
        $this->parte = $parte;
    }

    public function getTarea(): int
    {
        return $this->tarea;
    }

    public function setTarea(int $tarea): void
    {
        $this->tarea = $tarea;
    }

    public function getPieza(): string
    {
        return $this->pieza;
    }

    public function setPieza(string $pieza): void
    {
        $this->pieza = $pieza;
    }
}
