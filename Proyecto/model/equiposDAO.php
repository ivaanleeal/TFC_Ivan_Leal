<?php
require_once 'entidades/empleado.php';

class EmpleadoDAO
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
            $stmt = $this->pdo->prepare("SELECT dni, nombre, apellido FROM empleados");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Empleado');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerPorEmpleado(string $empleado): ?Empleado
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM empleados WHERE dni = :empleado");
            $stmt->execute(['empleado' => $empleado]);
            $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'empleado'); //Devuelve array 

            return $data ? $data[0] : null;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Empleado $empleado)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO empleados (dni, nombre, apellido) VALUES (:dni, :nombre, :apellido)");
            $stmt->execute([
                'dni' => $empleado->getdni(),
                'nombre' => $empleado->getNombre(),
                'apellido' => $empleado->getApellidos(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;            
        }
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT dni, nombre, apellido FROM empleados WHERE dni = ?");
            $stm->execute(array($id));
            return $stm->fetchObject("Empleado");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarEmpleado($id)
    {
        try {
            $sql = "DELETE FROM `empleados` "
                . " WHERE dni=:dni";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':dni', $id);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizarEmpleado(Empleado $empleado)
    {
        try {
            $sql = "UPDATE `empleados` SET 
                        dni = :dni,
                        nombre = :nombre,
                        apellido = :apellido
                    WHERE dni = :dni";

            $sentencia = $this->pdo->prepare($sql);

            $sentencia->bindValue(':dni', $empleado->getdni());
            $sentencia->bindValue(':nombre', $empleado->getNombre());
            $sentencia->bindValue(':apellido', $empleado->getApellidos());

            $sentencia->execute();
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
}
