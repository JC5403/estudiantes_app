<?php 

require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_mt_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';

require_once dirname(__DIR__) . '/estudiantes_app/models/materia.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/materias_controller.php';

use controllers\MateriaController;

$materiaController = new MateriaController ();

$id = empty($_GET['idE']) ? null : $_GET['idE'];
$tituloForm = empty ($id) ? "Registrar "  : "modificar";
$actionForm = empty ($id) ? "Registrar" : "actualizarM.php";

$materiaModel = empty ($id) ? null : $materiaController->detail($id);

$materia = [
    'codigo' => $materiaModel == null ? '' : $materiaModel->get('codigo'),
    'nombres' => $materiaModel == null ? '' : $materiaModel->get('nombres'),
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Materia</title>
</head>

<body>
    <h1><?php echo $tituloform; ?> Materia</h1>
    <br>
    <a href="index.php">Volver</a>
    <br><br>
    <form action="<?php echo $actionform; ?> " method=POST">
        <?php
        if (!empty($id)) {
            echo '<input id = "idInput" name="idInput type "hidden" value "'  . $id . '">';
        }
        ?>

        <div>
            <label for="codigoInput">Código:</label>
            <input id="CodigoInput " name="codigoInput" type="text" value="<?php echo $materia['codigo'] ?>" required>
        </div>
        <div>
            <label for="nombresInput">Nombre:</label>
            <input id="nombresInput " name="nombresInput" type="text" value="<?php echo $materia['nombres'] ?>" required>
        </div>
        <div>
            <button type="submit"> guardar </button>
        </div>
    </form>
</body>

</html>
