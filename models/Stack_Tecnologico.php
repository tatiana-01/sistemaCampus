<?php 
namespace Models;
class Stack_Tecnologico{
        protected $id_stack_tecnologico;
        protected $nombre_stack;
        protected $descripcion_stack;
        protected $id_ruta;
        public static $conn;



        public function __construct($args=[]){
            $this->id_stack_tecnologico =$args['id_stack_tecnologico'];
            $this->nombre_stack =$args['nombre_stack'];
            $this->descripcion_stack =$args['descripcion_stack'];
            $this->id_ruta =$args['id_ruta'];
        }

        public function postDataStack($data){
            $delimiter = ':';
            $valCols = $delimiter .join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO stack_tecnologico($cols) VALUES ($valCols)";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
           
            
        
        }

        public function selectStackById($id){
            $sql ="SELECT * FROM stack_tecnologico WHERE id_stack_tecnologico = :id_stack_tecnologico";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":id_stack_tecnologico",$id,\PDO::PARAM_INT);
            $stmt->execute();
            $stack= $stmt->fetch(\PDO::FETCH_ASSOC);
            return $stack;
        }

        public function updateStackById($data){
            $delimiter = ",:";
            $cont = 0;
            $valsColsString = $delimiter . join(",:",array_keys($data));
            $valColsArr = explode(',',$valsColsString);
            $sql ="UPDATE stack_tecnologico SET nombre_stack = :nombre_stack, descripcion_stack = :descripcion_stack, id_ruta = :id_ruta";
            $stmt = self::$conn->prepare($sql);
            foreach($data as $key){

                $stmt->bindParam($valsCols[$cont],$data[$key],\PDO::PARAM_STR);
                $cont++;
            }
            $stmt->execute();

            if ($stmt->rowCount()>0){
                $response=[[
                    'mensaje' => 'El registro fue actualizado correctamente',
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



        public function delStackById($id){
            $RESPONSE=[];
            $sql = "DELETE  FROM stack_tecnologico WHERE id_stack_tecnologico = :id_stack_tecnologico";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id_stack_tecnologico',$id,\PDO::PARAM_INT);
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