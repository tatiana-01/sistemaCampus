<?php
    namespace Models;
    class Campers{
        protected static $conn;
        protected static $columnsTbl=['id_camper','id_persona','id_nivel_camper'];
        
        private $id_camper;
        private $id_persona;
        private $id_nivel_camper;
        
       
        public function __construct($args = []){
            $this->id_persona = $args['id_persona'] ?? '';
            $this->id_camper = $args['id_camper'] ?? '';
            $this->id_nivel_camper = $args['id_nivel_camper'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO campers ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM campers";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $campers= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $campers;
        }
        public function loadDataByIdPersona($id){
            
            $sql = "SELECT * FROM campers WHERE id_persona=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $camper= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $json_camper=json_encode($camper);
            echo $json_camper;
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>