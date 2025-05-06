<?php
require_once 'entidades/pieza.php';

class PiezadoDAO
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
            $stmt = $this->pdo->prepare("SELECT codigo_pieza, nombre, marca, modelo FROM piezas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Pieza');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerPorPieza(string $pieza): ?Pieza
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM piezas WHERE codigo_pieza = :pieza");
            $stmt->execute(['pieza' => $pieza]);
            $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'Pieza'); //Devuelve array 

            return $data ? $data[0] : null;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Pieza $pieza)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO piezas (codigo_pieza, nombre, marca, modelo) VALUES (:codigo_pieza, :nombre, :marca, :modelo)");
            $stmt->execute([
                'codigo_pieza' => $pieza->getCodigoPieza(),
                'nombre' => $pieza->getNombre(),
                'marca' => $pieza->getMarca(),
                'modelo' => $pieza->getModelo(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;            
        }
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT codigo_pieza, nombre, marca, modelo FROM piezas WHERE codigo_pieza = ?");
            $stm->execute(array($id));
            return $stm->fetchObject("Pieza");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarPieza($id)
    {
        try {
            $sql = "DELETE FROM `piezas` "
                . " WHERE codigo_pieza=:codigo_pieza";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':codigo_pieza', $id);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizarPieza(Pieza $pieza)
    {
        try {
            $sql = "UPDATE `piezas` SET 
                        codigo_pieza = :codigo_pieza,
                        nombre = :nombre,
                        marca = :marca,
                        modelo = :modelo
                    WHERE codigo_pieza = :codigo_pieza";

            $sentencia = $this->pdo->prepare($sql);

            $sentencia->bindValue(':codigo_pieza', $pieza->getCodigoPieza());
            $sentencia->bindValue(':nombre', $pieza->getNombre());
            $sentencia->bindValue(':marca', $pieza->getMarca());
            $sentencia->bindValue(':modelo', $pieza->getModelo());

            $sentencia->execute();
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
}
