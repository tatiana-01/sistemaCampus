<?php
namespace Models;

class Topicos{

 
    protected $id_topico;
    protected $topico_nombre;
    protected $id_modulo;
    public static $conn;



    public function __construct($args=[]){
        $this->id_topico =$args['id_topico'];
        $this->topico_nombre =$args['topico_nombre'];
        $this->id_modulo =$args['id_modulo'];
    }

    public function postDatacapitulo($data){
        $delimiter = ':';
        echo var_dump($data);
        $valCols = $delimiter .join(',:',array_keys($data));
        $cols = join(',',array_keys($data));
        $sql = "INSERT INTO topico ($cols) VALUES ($valCols)";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($data);
       
        
    
    }

    public function getcapituloById($id){
        $sql ="SELECT * FROM topico WHERE id_topico = :id_topico";
        $stmt = self::$conn->prepare($sql);
    
        $stmt->bindParam(":id_topico",$id,\PDO::PARAM_INT);
        $stmt->execute();
        $modulo= $stmt->fetch(\PDO::FETCH_ASSOC);
        return $modulo;
    }

    public function getAllcapitulo(){

        $sql = "SELECT * FROM  topico";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $alltopico = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $alltopico;

    }

    public function updateStackById($data,$id){
        $delimiter = ",:";
        $cont = 1;
        $valsColsString = $delimiter . join(",:",array_keys($data));
        $valColsArr = explode(',',$valsColsString);
        $sql ="UPDATE topico SET topico_nombre = :topico_nombre,  =  id_modulo = :id_modulo WHERE id_topico =:id_topico";
        $stmt = self::$conn->prepare($sql);
       
        foreach($data as $key){
            echo $key;
            $stmt->bindValue($valColsArr[$cont],$key,\PDO::PARAM_STR);
            $cont++;
        }
        $stmt->bindParam(':id_topico',$id,\PDO::PARAM_INT);
        $stmt->execute();
  
    }



    public function delStackById($id){
        $RESPONSE=[];
        $sql = "DELETE  FROM topico WHERE id_topico = :id_topico";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id_topico',$id,\PDO::PARAM_INT);
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