<?php
require_once 'entidades/equipo.php';

class EquipoDAO
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
            $stmt = $this->pdo->prepare("SELECT id_equipo, marca, modelo, so, cliente_telefono FROM equipos E");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Equipo');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerPorEquipo(string $Equipo): ?Equipo
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Equipos WHERE dni = :Equipo");
            $stmt->execute(['Equipo' => $Equipo]);
            $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'Equipo'); //Devuelve array 

            return $data ? $data[0] : null;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Equipo $Equipo)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Equipos (id_equipo, marca, modelo, so, cliente_telefono) VALUES (:id_equipo, :marca, :modelo, :so, :cliente_telefono)");
            $stmt->execute([
                'id_equipo' => $Equipo->getIdEquipo(),
                'marca' => $Equipo->getMarca(),
                'modelo' => $Equipo->getModelo(),
                'so' => $Equipo->getSO(),
                'cliente_telefono' => $Equipo->getClienteTelefono(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;            
        }
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT id_equipo, marca, modelo, so, cliente_telefono FROM equipos WHERE id_equipo = ?");
            $stm->execute(array($id));
            return $stm->fetchObject("Equipo");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarEquipo($id)
    {
        try {
            $sql = "DELETE FROM `Equipos` "
                . " WHERE id_equipo=:id_equipo";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':id_equipo', $id);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizarEquipo(Equipo $Equipo)
    {
        try {
            $sql = "UPDATE `Equipos` SET 
                        dni = :dni,
                        nombre = :nombre,
                        apellido = :apellido
                    WHERE dni = :dni";

            $sentencia = $this->pdo->prepare($sql);

            $sentencia->bindValue(':dni', $Equipo->getdni());
            $sentencia->bindValue(':nombre', $Equipo->getNombre());
            $sentencia->bindValue(':apellido', $Equipo->getApellidos());

            $sentencia->execute();
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
}
