<?php
    namespace Models;
    class Empleado{
        protected static $conn;
        protected static $columnsTbl=['id_empleado','id_persona','id_arl'];
        
        private $id_empleado;
        private $id_persona;
        private $id_arl;
        
       
        public function __construct($args = []){
            $this->id_persona = $args['id_persona'] ?? '';
            $this->id_empleado = $args['id_empleado'] ?? '';
            $this->id_arl = $args['id_arl'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO empleado ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM empleado";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $campers= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $campers;
        }
        public function loadDataByIdPersona($id){            
            $sql = "SELECT * FROM empleado WHERE id_persona=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $empleado= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $empleado;
        }

        public function loadAllDataArl(){
            $sql = "SELECT * FROM arls";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $arls= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $arls;
        }

        public function loadDataArlById($id){            
            $sql = "SELECT * FROM arls WHERE id_arl=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $arl= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $arl;
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>