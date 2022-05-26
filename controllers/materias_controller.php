<?php

namespace controllers;

use controllers\IController;
use models\Materia;
use db\ConexionMT;


class MateriaController implements IController

{
  public function list()
  {
    $sql = " select * from materias ";
    $ConexionMT = new ConexionMT();
    $resultQuery = $ConexionMT->getResultQuery($sql);
    $materias = [];
    if ($resultQuery->num_rows > 0) {
      while ($row = $resultQuery->fetch_assoc()) {
        $materia = new Materia();
        $materia->set('id', $row['id']);
        $materia->set('codigo', $row['codigo']);
        $materia->set('nombres', $row['nombres']);
     

        array_push($materias, $materia);
      }
    }
    $ConexionMT->close();
    return $materias;
  }

  
  public function detail($id)
  {
    $sql = "SELECT * FROM estudaintes where id=" . $id;
    $ConexionMT = new ConexionMT();
    $resultQuery = $ConexionMT->getResultQuery($sql);
    $materia= null;
    if ($resultQuery->num_rows > 0) {
      while ($row = $resultQuery->fetch_assoc()) {
        $materia = new $materia();
        $materia->set('id', $row['id']);
        $materia->set('codigo', $row['codigo']);
        $materia->set('nombres', $row['nombres']);
   
      }
    }
    $ConexionMT->close();
    return $materia;
  }

  public function create($materiaModel)
  {
    $sql = "inser into estudaintes (codigo, nombres)";
    $sql .= "values '". $materiaModel->get('codigo'). "',
    '" . $materiaModel->get('nombres')  . ")";
     $ConexionMT = new ConexionMT ();
     $resultQuery = $ConexionMT->getResultQuery($sql);
     $ConexionMT->close();
     return $resultQuery;

  }

  public function update($id, $materiaModel)
  {
    $sql = "update materias set";
    $sql .= "codigo='". $materiaModel->get('codigo'). "',";
    $sql .= "nombres='". $materiaModel->get('nombres'). "',";;
    $sql .= "where id=" . $id;
    $ConexionMT = new ConexionMT();
    $resultQuery = $ConexionMT->getResultQuery($sql);
    $ConexionMT->close();
    return $resultQuery;
  }

  public function delete($id)
  {
    $sql = "delete from materias where id=" .$id;
    $ConexionMT = new ConexionMT();
    $resultQuery = $ConexionMT->getResultQuery($sql);
    $ConexionMT->close();
    return $resultQuery;
  }


}
