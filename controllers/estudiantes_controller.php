<?php 
namespace controllers;

use controllers\IController;
use db\ConexionDB;
use models\Estudiante;

class EstudianteController implements IController
{
  public function list ()
  {
    $sql = " select * from estudaintes ";
    $conexionDB = new ConexionDB();
    $resultQuery = $conexion->getResultQuery($sql);
    $estudiantes = [];
    if ($resultQuery->num_rows > 0) {
      while ($row = $resultQuery->fetch_assoc()) {
      $estudiante = new Estudiante ();
        $estudiante->set('id',$row['id']);
        $estudiante->set('codigo',$row['codigo']);
        $estudiante->set('nombres',$row['nombres']);
        $estudiante->set('apellidos',$row['apellidos']);
        $estudiante->set('edad',$row['edad']);
        
        array_push($estudiantes, $estudiante);
      }      
    }
    $conexionDB->close();
    return $estudiantes;
  }
