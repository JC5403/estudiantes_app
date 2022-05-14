<?php 
require_once dirname(__DIR__) . '/db/conexion_db.php';
require_once dirname(__DIR__) . '/controllers/i_controller.php';

require_once dirname(__DIR__) . '/models/estudiantes.php';
require_once dirname(__DIR__) . '/controllers/estudiantes_controller.php';

use controllers\EstudianteController;
$estudianteController = new EstudianteController ();