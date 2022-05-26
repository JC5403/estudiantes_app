<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias</title>
</head>
<body>
    <h1>Lista de materias</h1>
    <a href="form_materias.php">Registrar nueva materia</a>
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
             $materias = $materiaController->list();
             if (count($materia) > 0){
                 foreach($materia as  $materia) {
                     echo '<tr>';
                     echo '<td>'. $materia->get('codigo') . '</td>';
                     echo '<td>'. $materia->get('nombres') . ' ' . $materia->get('apellidos') . '</td>';
                     echo '<td>';
                     echo  '<a href= "form_materia.php?idE='. $materia->get('id') . '">Eliminar</a>';
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