<?php 

require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_mt_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';

require_once dirname(__DIR__) . '/estudiantes_app/models/materia.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/materias_controller.php';

use controllers\MateriaController;
use models\Materia;

$materiaController = new MateriaController ();

$materia= new Materia ();
$materia->set('codigo',$_POST['codigoInput']);
$materia->set('nombres',$_POST['nombresInput']);

$resultado = $materiaController->create($materia);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h1>Resultado de la operación</h1>
    <?php
    if($resultado){
        echo '<p>Registro exitoso</p>';
        echo '<br>';
        echo  '<a href="index.php">Volver a la lista </a>';
    }else {
        echo '<p>Se presento un error al guardar los datos, vuelva a intentarlo.</p>';
        echo'<br>';
        echo '<a href="from_materias.php">Volver</a>';
    }

?>
</body>
</html>