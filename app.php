
<?php 
    require_once 'vendor/autoload.php';
    // se hace el llamndo de las clases
    use App\Database;
    use Models\Pais;
    use Models\Region;
    use Models\Ciudad;
    use Models\Stack_Tecnologico;
    use Models\Capitulos;
    use Models\Temas;
    use Models\Unidades_Tematicas;
    use Models\Topicos;
    use Models\Modulos;
   
   


    $db = new Database();
    $conn = $db -> getConnection('mysql'); //conexion con mysql
    //asiganmos una conexion activa para todos los modelos que se crearon 
    Pais :: setConn($conn);
    Region :: setConn($conn);
    Ciudad :: setConn($conn);
    Capitulos::setConn($conn);
    Temas::setConn($conn);
    Stack_Tecnologico::setConn($conn);
    Unidades_Tematicas::setConn($conn);
    Modulos::setConn($conn);
    Topicos::setConn($conn);

   


?>