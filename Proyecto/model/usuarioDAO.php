<?php
require_once 'entidades/usuario.php';

class UsuarioDAO
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
            $stmt = $this->pdo->prepare("SELECT telefono, nombre, apellido, usuario, contrasena, privilegio, whatsap, llamar FROM clientes");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'usuario');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerPorUsuario(string $usuario): ?Usuario
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE usuario = :usuario");
            $stmt->execute(['usuario' => $usuario]);
            $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'usuario'); //Devuelve array 

            return $data ? $data[0] : null;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Usuario $usuario)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO clientes (telefono, nombre, apellido, usuario, contrasena, privilegio, Whatsap, Llamar) VALUES (:telefono, :nombre, :apellido, :usuario, :contrasena, :privilegio, :whatsap, :llamar)");
            $stmt->execute([
                'telefono' => $usuario->getTelefono(),
                'nombre' => $usuario->getNombre(),
                'apellido' => $usuario->getApellidos(),
                'usuario' => $usuario->getUsuario(),
                'contrasena' => password_hash($usuario->getContrasena(), PASSWORD_DEFAULT),
                'privilegio' => $usuario->getPrivilegio(),
                'whatsap' => $usuario->getWhatsap(),
                'llamar' => $usuario->getLlamar(),

            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT telefono, nombre, apellido, usuario, contrasena, privilegio, whatsap, llamar FROM clientes WHERE telefono = ?");
            $stm->execute(array($id));
            return $stm->fetchObject("Usuario");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarUsuario($id)
    {
        try {
            $sql = "DELETE FROM `clientes` "
                . " WHERE telefono=:telefono";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':telefono', $id);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizarUsuario(Usuario $usuario)
    {
        try {
            $sql = "UPDATE `clientes` SET 
                        nombre = :nombre,
                        apellido = :apellido,
                        usuario = :usuario,
                        contrasena = :contrasena,
                        privilegio = :privilegio,
                        whatsap = :whatsap,
                        llamar = :llamar
                    WHERE telefono = :telefono";

            $sentencia = $this->pdo->prepare($sql);

            $sentencia->bindValue(':telefono', $usuario->getTelefono());
            $sentencia->bindValue(':nombre', $usuario->getNombre());
            $sentencia->bindValue(':apellido', $usuario->getApellidos());
            $sentencia->bindValue(':usuario', $usuario->getUsuario());
            $sentencia->bindValue(':contrasena', $usuario->getContrasena());
            $sentencia->bindValue(':privilegio', $usuario->getPrivilegio());
            $sentencia->bindValue(':whatsap', $usuario->getWhatsap());
            $sentencia->bindValue(':llamar', $usuario->getLlamar());

            $sentencia->execute();
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }

    public function obtenerReparaciones($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT 
    P.fecha as FechaParte, 
    P.notas as NotasParte, 
    E.marca as MarcaEquipo, 
    E.modelo as ModeloEquipo, 
    R.parte, 
    R.tarea as ReparacionTarea, 
    R.Pieza as ReparacionPieza, 
    PI.nombre as PiezaNombre, 
    PI.marca as MarcaPieza, 
    PI.modelo as ModeloPieza, 
    T.descripcion as TareaDescripccion, 
    T.tiempo as TareaTiempo,
    E.id_equipo as EquipoId 
FROM clientes C
INNER JOIN partes P ON P.cliente_telefono = C.telefono
INNER JOIN equipos E ON E.id_equipo = P.id_equipo
INNER JOIN tareas T ON T.numero_parte = P.numero_parte
INNER JOIN reparacion_parte R ON R.parte = T.numero_parte AND R.tarea = T.id_tarea
INNER JOIN piezas PI ON PI.codigo_pieza = R.pieza
WHERE telefono = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerEstado($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT 
    P.Seguimiento AS seguimientoParte, 
    P.Recogido AS ParteRecogido, 
    E.marca AS MarcaEquipo, 
    E.modelo AS ModeloEquipo, 
    R.parte, 
    R.tarea AS ReparacionTarea, 
    R.Pieza AS ReparacionPieza, 
    PI.nombre AS PiezaNombre, 
    PI.marca AS MarcaPieza, 
    PI.modelo AS ModeloPieza, 
    T.descripcion AS TareaDescripccion, 
    T.tiempo AS TareaTiempo,
    T.estado AS TareaEstado,       
    E.id_equipo AS EquipoId 
FROM clientes C
INNER JOIN partes P ON P.cliente_telefono = C.telefono
INNER JOIN equipos E ON E.id_equipo = P.id_equipo
INNER JOIN tareas T ON T.numero_parte = P.numero_parte
INNER JOIN reparacion_parte R ON R.parte = T.numero_parte AND R.tarea = T.id_tarea
INNER JOIN piezas PI ON PI.codigo_pieza = R.pieza
WHERE telefono = ?
");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
