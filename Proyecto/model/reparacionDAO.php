<?php
require_once 'entidades/reparacion.php';

class ReparacionDAO
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = Database::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTodos()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT parte, tarea, pieza FROM reparacion_parte");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Reparacion');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerPartes()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT numero_parte, fecha, notas, seguimiento, recogido, cliente_telefono, id_equipo, empleado_dni FROM partes");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Parte');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTareas()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT numero_parte, id_tarea, descripcion, estado, tiempo, imagen, empleado_dni FROM tareas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'tarea');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerPiezas()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT codigo_pieza, nombre, marca, modelo FROM piezas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Pieza');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Reparacion $reparacion)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO reparacion_parte (parte, tarea, pieza) VALUES (:parte, :tarea, :pieza)");
            $stmt->execute([
                'parte' => $reparacion->getParte(),
                'tarea' => $reparacion->getTarea(),
                'pieza' => $reparacion->getPieza(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;            
        }
    }

    public function obtener($idP,$idT)
    {
        try {
            $stm = $this->pdo->prepare("SELECT parte, tarea, pieza FROM reparacion_parte WHERE parte = ? AND tarea = ?");
            $stm->execute(array($idP,$idT));
            return $stm->fetchObject("Reparacion");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarReparacion($idP,$idT)
    {
        try {
            $sql = "DELETE FROM `reparacion_parte` "
                . " WHERE parte=:parte AND tarea=:tarea";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':parte', $idP);
            $sentencia->bindValue(':tarea', $idT);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizarReparaciom(Reparacion $reparacion)
    {
        try {
            $sql = "UPDATE `reparacion_parte` SET 
                    pieza = :pieza
                    WHERE parte=:parte AND tarea=:tarea";

            $sentencia = $this->pdo->prepare($sql);

            $sentencia->bindValue(':parte', $reparacion->getParte());
            $sentencia->bindValue(':tarea', $reparacion->getTarea());
            $sentencia->bindValue(':pieza', $reparacion->getPieza());

            $sentencia->execute();
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
}
