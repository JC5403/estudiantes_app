<?php
require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';

require_once dirname(__DIR__) . '/estudiantes_app/models/estudiante.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/estudiantes_controller.php';

use controllers\EstudianteController;

$estudianteController = new EstudianteController();



$id = empty($_GET['idE']) ? null : $_GET['idE'];
$tituloform = empty($id) ?  "Registrar" : "Modificar";
$actionform = empty($id) ? "Registrar.php" : "actualizar.php";

$estudianteModel = empty($id) ? null : $estudianteController->detail($id);

$estudiante = [
    'codigo' => $estudianteModel == null ? '' : $estudianteModel->get('codigo'),
    'nombres' => $estudianteModel == null ? '' : $estudianteModel->get('nombres'),
    'apellidos' => $estudianteModel == null ? '' : $estudianteModel->get('apellidos'),
    'edad' => $estudianteModel == null ? '' : $estudianteModel->get('edad'),
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Estudiante</title>
</head>

<body>
    <h1><?php echo $tituloform; ?> Estudiante</h1>
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
            <input id="CodigoInput " name="codigoInput" type="text" value="<?php echo $estudiante['codigo'] ?>" required>
        </div>
        <div>
            <label for="nombresInput">Nombes:</label>
            <input id="nombresInput " name="nombresInput" type="text" value="<?php echo $estudiante['nombres'] ?>" required>
        </div>
        <div>
            <label for="apellidosInput">apellidos:</label>
            <input id="nombresInput " name="nombresInput" type="text" value="<?php echo $estudiante['apellidos'] ?>" required>
        </div>
        <div>
            <label for="edadInput">edad:</label>
            <input id="edadnput " name="edadInput" type="number" min="16" value="<?php echo $estudiante['edad'] ?>" required>
        </div>
        <div>
            <button type="submit"> guardar </button>
        </div>
    </form>
</body>

</html>