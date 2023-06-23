<?php 
    require_once 'vendor/autoload.php';

    // se hace el llamndo de las clases
    use App\Database;
    use Models\Pais;
    use Models\Region;
    use Models\Ciudad;
    use Models\Eps;
    use Models\Rol;
   
    $db = new Database();
    $conn = $db -> getConnection('mysql'); //conexion con mysql
    //asiganmos una conexion activa para todos los modelos que se crearon 
    Pais :: setConn($conn);
    Region :: setConn($conn);
    Ciudad :: setConn($conn);
    Eps :: setConn($conn);
    Rol :: setConn($conn);
   

   /*  require_once('models/personas.php');
    require_once('models/campers.php');
    require_once('models/matricula.php');
    require_once('models/acudiente.php');
    require_once('models/camperAcudiente.php');
    require_once('models/empleado.php');
    require_once('models/ruta.php');
    require_once('models/contactoEmpleado.php'); */
    use Models\Personas;
    use Models\Campers;
    use Models\Matricula;
    use Models\Acudiente;
    use Models\CamperAcudiente;
    use Models\Empleado;
    use Models\Ruta;
    use Models\ContactoEmpleado; 
    Personas::setConn($conn);
    Campers::setConn($conn);
    Matricula::setConn($conn);
    Acudiente::setConn($conn);
    CamperAcudiente::setConn($conn);
    Empleado::setConn($conn);
    Ruta::setConn($conn);
    ContactoEmpleado::setConn($conn);

?>