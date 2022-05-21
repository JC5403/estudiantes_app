<?php 
require_once dirname(__DIR__) . '/db/conexion_db.php';
require_once dirname(__DIR__) . '/controllers/i_controller.php';

require_once dirname(__DIR__) . '/models/estudiantes.php';
require_once dirname(__DIR__) . '/controllers/estudiantes_controller.php';

use controllers\EstudianteController;
use models\Estudiante;

$estudianteController = new EstudianteController ();

$estudiante = new Estudiante ();
$estudiante->set('codigo',$_POST['codigoInput']);
$estudiante->set('nombres',$_POST['nombresInput']);
$estudiante->set('apellidos',$_POST['apellidosInput']);
$estudiante->set('edad',$_POST['edadInput']);

$resultado = $estudianteController->update($_POST['idInput'], $estudiante);

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
       echo '<a href="from_estudaintes.php?idE=' .$estudiante->get('id') . '">volver</a>';  
    }
    ?>
    
</body>
</html>