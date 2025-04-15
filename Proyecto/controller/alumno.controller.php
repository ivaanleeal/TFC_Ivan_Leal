<?php
require_once '../model/alumnoDAO.php';
require_once '../model/entidades/alumno.php';

/*
 * ¿Qué va a hacer el controlador?
 * Implementar las diferentes acciones que se pueden ejecutar desde la vista. 
 * Instanciar al modelo.
 * Modificar sus propiedades (cuando sea necesario).
 * Llamar a uno de sus métodos (el cual, nos retornará algún dato).
 * Enviar los datos retornados por el modelo a la vista.
 */

//Pendiente implementar validación en servidor

class AlumnoController{
    
    private $model; //Representa las operaciones de BD para el alumno.
    
    public function __construct(){
        $this->model = new AlumnoDAO();
    }
    
    public function index(){
        require_once '../view/header.php';
        require_once '../view/alumno/alumno.php';
        require_once '../view/footer.php';
    }
    
    public function editar(){
        $alm = new Alumno();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->obtener($_REQUEST['id']);  //Al DAO le solicitamos recuperar un alumno.
        }
        
        require_once '../view/header.php';
        require_once '../view/alumno/alumno-editar.php';
        require_once '../view/footer.php';
    }
    
    public function guardar(){
        /*Para realizar la validación podemos implementarla aquí o llamar a un método que nos recoja los datos del 
        Request y nos devuelva un bool para continuar y redirigir al index o para retornarnos al formulario de edición. */
        
        //Después de la validación
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['Nombre'];
        $apellido = $_REQUEST['Apellido'];
        $correo = $_REQUEST['Correo'];
        $sexo = $_REQUEST['Sexo'];
        $fechaNacimiento = $_REQUEST['FechaNacimiento'];
                
        $alm = new Alumno();
                        
        $alm->setId($id);
        $alm->setNombre($nombre); 
        $alm->setApellido($apellido);
        $alm->setCorreo($correo);
        $alm->setSexo($sexo);
        $alm->setFechaNacimiento($fechaNacimiento);

        $alm->getId() > 0 
            ? $this->model->actualizar($alm)
            : $this->model->registrar($alm);
        
        header('Location: index.php?c=alumno');
    }
    
    public function eliminar(){
        $this->model->eliminar($_REQUEST['id']);
        header('Location: index.php?c=alumno');
    }
}