<?php 
require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';

require_once dirname(__DIR__) . '/estudiantes_app/models/estudiantes.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/estudiantes_controller.php';

use controllers\EstudianteController;
$estudianteController = new EstudianteController ();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
</head>
<body>
    <h1>Lista de estudiantes</h1>
    <a href="form_estudiantes.php">Registrar nuevo estudiante</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Estudainte</th>
                <th>Edad</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
             <?php
             $estudiantes = $estudianteController->list();
             if (count($estudiantes) > 0){
                 foreach($estudiantes as  $estudiante) {
                     echo '<tr>';
                     echo '<td>'. $estudiante->get('codigo') . '</td>';
                     echo '<td>'. $estudiante->get('nombres') . ' ' . $estudiante->get('apellidos') . '</td>';
                     echo '<td>'. $estudiante->get('edad'). '</td>';
                     echo '<td>';
                     echo  '<a href= "form_estudiantes.php?idE='. $estudiante->get('id') . '">Eliminar</a>';
                     echo '</td>';
                     echo '</tr>';
                 }
             } else{
                 echo '<tr>';
                 echo '<td coldspan="3"> No hay registros </td>';
                 echo '</tr>';
             }
             ?>
        </tbody>
    </table>
</body>
</html>