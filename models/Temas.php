<?php 

namespace Models;

class Temas{


    protected $id_tema;
    protected $tema_nombre;
    protected $id_capitulo;
    public static $conn;



    public function __construct($args=[]){
        $this->id_tema =$args['id_tema'];
        $this->tema_nombre =$args['tema_nombre'];
        $this->id_capitulo =$args['id_capitulo'];
    }

    public function postDatacapitulo($data){
        $delimiter = ':';
        echo var_dump($data);
        $valCols = $delimiter .join(',:',array_keys($data));
        $cols = join(',',array_keys($data));
        $sql = "INSERT INTO temas ($cols) VALUES ($valCols)";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($data);
       
        
    
    }

    public function getcapituloById($id){
        $sql ="SELECT * FROM temas WHERE id_tema = :id_tema";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":id_tema",$id,\PDO::PARAM_INT);
        $stmt->execute();
        $capitulo= $stmt->fetch(\PDO::FETCH_ASSOC);
        return $capitulo;
    }

    public function getAllcapitulo(){

        $sql = "SELECT * FROM  temas";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $alltemas = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $alltemas;

    }

    public function updateStackById($data,$id){
        $delimiter = ",:";
        $cont = 1;
        $valsColsString = $delimiter . join(",:",array_keys($data));
        $valColsArr = explode(',',$valsColsString);
        $sql ="UPDATE temas SET tema_nombre = :tema_nombre,  =  id_capitulo = :id_capitulo WHERE id_tema =:id_tema";
        $stmt = self::$conn->prepare($sql);
       
        foreach($data as $key){
            echo $key;
            $stmt->bindValue($valColsArr[$cont],$key,\PDO::PARAM_STR);
            $cont++;
        }
        $stmt->bindParam(':id_tema',$id,\PDO::PARAM_INT);
        $stmt->execute();
  
    }



    public function delStackById($id){
        $RESPONSE=[];
        $sql = "DELETE  FROM temas WHERE id_tema = :id_tema";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id_tema',$id,\PDO::PARAM_INT);
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