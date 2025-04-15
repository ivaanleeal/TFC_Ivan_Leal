<?php
require_once 'entidades/contacto.php';

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



    public function obtenerPorMensaje(string $mensaje): ?contacto
    {
        $stmt = $this->pdo->prepare("SELECT * FROM mensajes WHERE id = :mensaje");
        $stmt->execute(['mensaje' => $mensaje]);
        $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'contacto'); //Devuelve array 

        return $data ? $data[0] : null;
    }

    public function registrarMensaje(contacto $contacto)
    {
        $stmt = $this->pdo->prepare("INSERT INTO mensajes (id, Nombre, Apellidos, Correo, Mensaje) VALUES (:id, :Nombre, :Apellidos, :Correo, :Mensaje)");
        $stmt->execute([
            'id' => $contacto->getId(),
            'Nombre' => $contacto->getNombre(),
            'Apellidos' => $contacto->getApellidos(),
            'Correo' => $contacto->getCorreo(),
            'Mensaje' => $contacto->getMensaje()
        ]);
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM mensajes WHERE id = ?");
            $stm->execute(array($id));
            return $stm->fetchObject("contacto");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}