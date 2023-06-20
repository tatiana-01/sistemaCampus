<?php
namespace Models;

class Unidades_Tematicas{
    protected static $conn;
    private $nombre_unidad_tematica;
    private $id_stack_tecnologico;



    public function __construct($args=[]){

        $this-> nombre_unidad_tematica = $args['nombre_unidad_tematica'];
        $this-> id_stack_tecnologico = $args['id_stack_tecnologico'];

    }

    public function postUnidad($data){
        $delimiter = ':';
        $valCols = $delimiter . join(',:',array_keys($data));
        $cols = join(',',array_keys($data));
        $sql = "INSERT INTO unidades_tematicas($cols) VALUES ($valCols)";
        $stmt= self::$conn->prepare($sql);
        $stmt->execute($data);

    }


    public function delUnidadById($id){
        $sql = "SELECT * FROM unidades_tematicas WHERE id_unidad_tematica :id_unidad_tematica";
        $stmt= self::$conn->prepare($sql);
        $stmt->bindParam("id_unidad_tematica",$id,\PDO::PARAM_INT);
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
    public function getUnidadById($id){
        $sql = "SELECT * FROM unidades_tematicas WHERE id_unidad_tematica = :id_unidad_tematica";
        $stmt=self::$conn->prepare($sql);
        $stmt->bindParam(":id_unidad_tematica",$id,\PDO::PARAM_INT);
        $stmt->execute();
        $unidadTematica = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $unidadTematica;
    }

    public  function getAllUnidades(){
        $sql = "SELECT * FROM unidades_tematicas";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $unidadesTematicas = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $unidadesTematicas;

    }

    public function updateUnidad($data,$id){
        $delimiter = ',:';
        $cont =1;
        $valColsStr= $delimiter . join(',:',array_keys($data));
        $valColsArr = explode(',',$valColsStr);
        $sql = "UPDATE unidad_tematica SET nombre_unidad_tematica = :nombre_unidad_tematica ,id_stack_tecnologico = :id_stack_tecnologico WHERE id_unidad_tematica = :id_unidad_tematica ";
        $stmt = self::$conn->prepare($sql);
        foreach($data as $key){
            $stmt->bindValue($valColsArr[$conn],$key,\PDO::PARAM_STR);
            $cont++;
        }
        $stmt->bindParam(":id_unidad_tematica",$id,\PDO::PARAM_INT);
        $stmt->execute();

    }

    public static function setConn($connDB){
        self::$conn =$connDB;
    }


}

?>