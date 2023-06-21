<?php 
    require_once 'vendor/autoload.php';
   /*  require_once('models/personas.php');
    require_once('models/campers.php');
    require_once('models/matricula.php');
    require_once('models/acudiente.php');
    require_once('models/camperAcudiente.php');
    require_once('models/empleado.php');
    require_once('models/ruta.php');
    require_once('models/contactoEmpleado.php'); */
    use App\Database;
    use Models\Personas;
    use Models\Campers;
    use Models\Matricula;
    use Models\Acudiente;
    use Models\CamperAcudiente;
    use Models\Empleado;
    use Models\Ruta;
    use Models\ContactoEmpleado; 
    $db = new Database();
    $conn = $db->getConnection('mysql');
    Personas::setConn($conn);
    Campers::setConn($conn);
    Matricula::setConn($conn);
    Acudiente::setConn($conn);
    CamperAcudiente::setConn($conn);
    Empleado::setConn($conn);
    Ruta::setConn($conn);
    ContactoEmpleado::setConn($conn);
?>