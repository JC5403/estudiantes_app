<?php 

require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_mt_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';

require_once dirname(__DIR__) . '/estudiantes_app/models/materia.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/materias_controller.php';

use controllers\MateriaController;
use models\Materia;

$materiaController = new MateriaController ();

$materia = new Materia ();
$materia->set('codigo',$_POST['codigoInput']);
$materia->set('nombres',$_POST['nombresInput']);

$resultado = $materiaController->update($_POST['idInput'], $materia);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <?php
    if ($resultado) {
        echo '<p>Actualización exitosa </p>';
        echo '<br>';
        echo '<a href="index.php">volver a la lista</a>';
    } else {
       echo '<p> Se presentó un error al guardar los datos. Vuelva a intentar. </p>';
       echo '<br>';
       echo '<a href="from_estudaintes.php?idE=' .$materia->get('id') . '">volver</a>';  
    }
    ?>
    
</body>
</html>