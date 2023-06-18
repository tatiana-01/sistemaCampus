<?php 
namespace Models;

class capitulos{

    protected $id_capitulo;
    protected $capitulo_name;
    protected $id_unidad_tematica;
    public static $conn;



    public function __construct($args=[]){
        $this->id_capitulo =$args['id_capitulo'];
        $this->capitulo_name =$args['capitulo_name'];
        $this->id_unidad_tematica =$args['id_unidad_tematica'];
    }

    public function postDatacapitulo($data){
        $delimiter = ':';
        echo var_dump($data);
        $valCols = $delimiter .join(',:',array_keys($data));
        $cols = join(',',array_keys($data));
        $sql = "INSERT INTO capitulos ($cols) VALUES ($valCols)";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($data);
       
        
    
    }

    public function getcapituloById($id){
        $sql ="SELECT * FROM capitulos WHERE id_capitulo = :id_capitulo";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":id_capitulo",$id,\PDO::PARAM_INT);
        $stmt->execute();
        $capitulo= $stmt->fetch(\PDO::FETCH_ASSOC);
        return $capitulo;
    }

    public function getAllcapitulo(){

        $sql = "SELECT * FROM  capitulos";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $allcapitulos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $allCapitulos;

    }

    public function updateStackById($data,$id){
        $delimiter = ",:";
        $cont = 1;
        $valsColsString = $delimiter . join(",:",array_keys($data));
        $valColsArr = explode(',',$valsColsString);
        $sql ="UPDATE capitulos SET capitulo_name = :capitulo_name,  =  id_unidad_tematica = :id_unidad_tematica WHERE id_capitulo =:id_capitulo";
        $stmt = self::$conn->prepare($sql);
       
        foreach($data as $key){
            echo $key;
            $stmt->bindValue($valColsArr[$cont],$key,\PDO::PARAM_STR);
            $cont++;
        }
        $stmt->bindParam(':id_capitulo',$id,\PDO::PARAM_INT);
        $stmt->execute();
  
    }



    public function delStackById($id){
        $RESPONSE=[];
        $sql = "DELETE  FROM capitulos WHERE id_capitulo = :id_capitulo";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id_capitulo',$id,\PDO::PARAM_INT);
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