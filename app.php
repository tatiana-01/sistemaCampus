<?php 
    require_once 'vendor/autoload.php';
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