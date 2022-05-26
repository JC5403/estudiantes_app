<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias</title>
</head>
<body>
    <h1>Lista de materias</h1>
    <a href="form_estudiantes.php">Registrar nueva materia</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Materia</th>
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