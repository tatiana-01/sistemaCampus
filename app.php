
<?php 
    require_once 'vendor/autoload.php';
    // se hace el llamndo de las clases
    use App\Database;
    use Models\Pais;
    use Models\Region;
    use Models\Ciudad;
    use Models\Stack_Tecnologico;
   
   


    $db = new Database();
    $conn = $db -> getConnection('mysql'); //conexion con mysql
    //asiganmos una conexion activa para todos los modelos que se crearon 
    Stack_tecnologico::setConn($conn);
    Pais :: setConn($conn);
    Region :: setConn($conn);
    Ciudad :: setConn($conn);


?>