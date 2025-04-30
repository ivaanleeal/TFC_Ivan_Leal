<?php
require_once 'entidades/parte.php';
require_once 'entidades/usuario.php';
require_once 'entidades/equipo.php';
require_once 'entidades/empleado.php';

class ParteDAO
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
            $stmt = $this->pdo->prepare("SELECT numero_parte, fecha, notas, seguimiento, recogido, cliente_telefono, id_equipo, empleado_dni FROM partes");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Parte');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerPorParte()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT id_equipo, marca, modelo, so, cliente_telefono FROM equipos E");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Equipo');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerUsuarios()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT telefono, nombre, apellido, usuario, contrasena, privilegio, whatsap, llamar FROM clientes");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'usuario');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerPorEquipos()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Equipos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Equipo');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerEmpleados()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT dni, nombre, apellido FROM empleados");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Empleado');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(parte $parte)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO partes (fecha, notas, seguimiento, recogido, cliente_telefono, id_equipo, empleado_dni) VALUES (:fecha, :notas, :seguimiento, :recogido, :cliente_telefono, :id_equipo, :empleado_dni)");
            $stmt->execute([
                'fecha' => $parte->getFecha(),
                'notas' => $parte->getNotas(),
                'seguimiento' => $parte->getSeguimiento(),
                'recogido' => $parte->getRecogido(),
                'cliente_telefono' => $parte->getClienteTelefono(),
                'id_equipo' => $parte->getIdEquipo(),
                'empleado_dni' => $parte->getEmpleadoDni(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT  numero_parte, fecha, notas, seguimiento, recogido, cliente_telefono, id_equipo, empleado_dni FROM partes WHERE numero_parte = ?");
            $stm->execute(array($id));
            return $stm->fetchObject("parte");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarparte($id)
    {
        try {
            $sql = "DELETE FROM `partes` "
                . " WHERE numero_parte=:numero_parte";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':numero_parte', $id);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizarparte(parte $parte)
    {
        try {
            $sql = "UPDATE `partes` SET 
                        fecha = :fecha,
                        notas = :notas,
                        seguimiento = :apellido
                        recogido = :apellido
                        cliente_telefono = :apellido
                        id_equipo = :apellido
                        empleado_dni = :apellido
                    WHERE numero_parte = :numero_parte";

            $sentencia = $this->pdo->prepare($sql);

            $sentencia->bindValue(':fecha', $parte->getFecha());
            $sentencia->bindValue(':notas', $parte->getNotas());
            $sentencia->bindValue(':seguimiento', $parte->getSeguimiento());
            $sentencia->bindValue(':recogido', $parte->getRecogido());
            $sentencia->bindValue(':cliente_telefono', $parte->getClienteTelefono());
            $sentencia->bindValue(':id_equipo', $parte->getIdEquipo());
            $sentencia->bindValue(':empleado_dni', $parte->getEmpleadoDni());
            

            $sentencia->execute();
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
}
