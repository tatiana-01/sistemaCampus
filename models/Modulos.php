<?php 
namespace Models;

class Modulos{
    
    protected $id_modulo;
    protected $modulo_nombre;
    protected $id_tema;
    public static $conn;



    public function __construct($args=[]){
        $this->id_modulo =$args['id_modulo'];
        $this->modulo_nombre =$args['modulo_nombre'];
        $this->id_tema =$args['id_tema'];
    }

    public function postDatacapitulo($data){
        $delimiter = ':';
        echo var_dump($data);
        $valCols = $delimiter .join(',:',array_keys($data));
        $cols = join(',',array_keys($data));
        $sql = "INSERT INTO modulos ($cols) VALUES ($valCols)";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($data);
       
        
    
    }

    public function getcapituloById($id){
        $sql ="SELECT * FROM modulos WHERE id_modulo = :id_modulo";
        $stmt = self::$conn->prepare($sql);
    
        $stmt->bindParam(":id_modulo",$id,\PDO::PARAM_INT);
        $stmt->execute();
        $modulo= $stmt->fetch(\PDO::FETCH_ASSOC);
        return $modulo;
    }

    public function getAllcapitulo(){

        $sql = "SELECT * FROM  modulos";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $allmodulos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $allmodulos;

    }

    public function updateStackById($data,$id){
        $delimiter = ",:";
        $cont = 1;
        $valsColsString = $delimiter . join(",:",array_keys($data));
        $valColsArr = explode(',',$valsColsString);
        $sql ="UPDATE modulos SET modulo_nombre = :modulo_nombre,  =  id_tema = :id_tema WHERE id_modulo =:id_modulo";
        $stmt = self::$conn->prepare($sql);
       
        foreach($data as $key){
            echo $key;
            $stmt->bindValue($valColsArr[$cont],$key,\PDO::PARAM_STR);
            $cont++;
        }
        $stmt->bindParam(':id_modulo',$id,\PDO::PARAM_INT);
        $stmt->execute();
  
    }



    public function delStackById($id){
        $RESPONSE=[];
        $sql = "DELETE  FROM modulos WHERE id_modulo = :id_modulo";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id_modulo',$id,\PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()>0){
            $response=[[
                'mensaje' => 'El registro fue eliminado correctamente',
                'codEstado' => '200',
                'totalreg' => $stmt->rowCount()
            ]];
        }else{
            $response=[[
                'mensaje' => 'El registro no fue eliminado',
                'reject' => 'Registro no encontrado o no existe',
                'codEstado' => '204',
                'totalreg' => $stmt->rowCount()
            ]];
        }
        return $response;


    }
    public static function setConn($conDB){
        self::$conn = $conDB;
    }






}


?>