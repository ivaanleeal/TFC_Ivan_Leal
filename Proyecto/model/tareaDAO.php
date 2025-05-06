<?php
require_once 'entidades/tarea.php';
require_once 'entidades/empleado.php';
require_once 'entidades/parte.php';

class TareaDAO
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
            $stmt = $this->pdo->prepare("SELECT numero_parte, id_tarea, descripcion, estado, tiempo, imagen, empleado_dni FROM tareas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'tarea');
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

    public function listarConUsuarios()
    {
        try {
            $sql = "SELECT p.*, c.telefono, c.nombre, c.apellido
                    FROM partes p
                    INNER JOIN clientes c ON p.cliente_telefono = c.telefono"; 

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $partes = [];

            $parte = [];

            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $parte[] = [
                    $partes[] = $fila['numero_parte'],
                    $partes[] = $fila['telefono'],
                    $partes[] = $fila['nombre'],
                    $partes[] = $fila['apellido'],
                ];
            }

            return $parte;
        } catch (Exception $e) {
            echo "Error al listar partes con usuarios: " . $e->getMessage();
            return [];
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

    public function registrar(Tarea $tarea)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tareas (numero_parte, id_tarea, descripcion, estado, tiempo, imagen, empleado_dni) VALUES (:numero_parte, :id_tarea, :descripcion, :estado, :tiempo, :imagen, :empleado_dni)");
            $stmt->execute([
                'numero_parte' => $tarea->getNumeroParte(),
                'id_tarea' => $tarea->getIdTarea(),
                'descripcion' => $tarea->getDescripcion(),
                'estado' => $tarea->getEstado(),
                'tiempo' => $tarea->getTiempo(),
                'imagen' => $tarea->getImagen(),
                'empleado_dni' => $tarea->getEmpleadoDni(),
            ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function obtenerUltimoIdTarea($numeroParte)
    {
        try {
            $sql = "SELECT MAX(id_tarea) AS max_id FROM tareas WHERE numero_parte = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$numeroParte]);

            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($fila && $fila['max_id'] !== null) {
                return (int)$fila['max_id'];
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            error_log("Error al obtener el último id_tarea: " . $e->getMessage());
            return 0;
        }
    }

    public function obtener($idP, $idT)
    {
        try {
            $stm = $this->pdo->prepare("SELECT numero_parte, id_tarea, descripcion, estado, tiempo, imagen, empleado_dni FROM tareas WHERE numero_parte = ? AND id_tarea = ?");
            $stm->execute(array($idP, $idT));
            return $stm->fetchObject("tarea");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminartarea($idP, $idT)
    {
        try {
            $sql = "DELETE FROM `tareas` "
                . " WHERE numero_parte=:numero_parte AND id_tarea = :id_tarea";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':numero_parte', $idP);
            $sentencia->bindValue(':id_tarea', $idT);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizartarea(Tarea $tarea)
    {
        try {
            $sql = "UPDATE `tareas` SET 
                        descripcion = :descripcion,
                        estado = :estado,
                        tiempo = :tiempo,
                        imagen = :imagen,
                        empleado_dni = :empleado_dni
                    WHERE numero_parte = :numero_parte AND id_tarea = :id_tarea";

            $sentencia = $this->pdo->prepare($sql);

            $sentencia->bindValue(':numero_parte', $tarea->getNumeroParte());
            $sentencia->bindValue(':id_tarea', $tarea->getIdTarea());
            $sentencia->bindValue(':descripcion', $tarea->getDescripcion());
            $sentencia->bindValue(':estado', $tarea->getEstado());
            $sentencia->bindValue(':tiempo', $tarea->getTiempo());
            $sentencia->bindValue(':imagen', $tarea->getImagen());
            $sentencia->bindValue(':empleado_dni', $tarea->getEmpleadoDni());


            $sentencia->execute();
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
}
