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



    public function obtenerPorUsuario(string $usuario): ?Usuario
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE usuario = :usuario");
        $stmt->execute(['usuario' => $usuario]);
        $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'usuario'); //Devuelve array 

        return $data ? $data[0] : null;
    }

    public function registrar(Usuario $usuario)
    {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (telefono, nombre, apellido, usuario, email, contrasena, privilegio) VALUES (:telefono, :nombre, :apellido, :usuario, :contrasena, :privilegio)");
        $stmt->execute([
            'telefono' => $usuario->getTelefono(),
            'nombre' => $usuario->getNombre(),
            'apellido' => $usuario->getApellidos(),
            'usuario' => $usuario->getUsuario(),
            'contrasena' => password_hash($usuario->getContrasena(), PASSWORD_DEFAULT),
            'privilegio' => $usuario->getPrivilegio()
        ]);
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM clientes WHERE id = ?");
            $stm->execute(array($id));
            return $stm->fetchObject("Usuario");
        } catch (Exception $e) {
            die($e->getMessage());
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
    T.tiempo as TareaTiempo 
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
}
