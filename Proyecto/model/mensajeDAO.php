<?php
require_once 'entidades/mensaje.php';

class MensajeDAO
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
        $stmt = $this->pdo->prepare("SELECT * FROM mensajes ORDER BY Visto ASC, id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'mensaje');
    }
    


    public function actualizarVistoPorId($id, $visto)
    {
        $stmt = $this->pdo->prepare("UPDATE mensajes SET visto = :visto WHERE id = :id");
        return $stmt->execute(['visto' => $visto, 'id' => $id]);
    }

    public function eliminarMensaje($id)
    {
        try {
            $sql = "DELETE FROM `mensajes` "
                . " WHERE id=:id";
            $sentencia = $this->pdo->prepare($sql);
            $sentencia->bindValue(':id', $id);
            $sentencia->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
