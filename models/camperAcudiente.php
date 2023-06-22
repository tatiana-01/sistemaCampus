<?php
    namespace Models;
    class CamperAcudiente{
        protected static $conn;
        protected static $columnsTbl=['id_camper_acudiente','id_camper','id_acudiente'];
        private $id_camper_acudiente;
        private $id_camper;
        private $id_acudiente;
        
       
        public function __construct($args = []){
            $this->id_camper_acudiente = $args['id_camper_acudiente'] ?? '';
            $this->id_camper = $args['id_camper'] ?? '';
            $this->id_acudiente = $args['id_acudiente'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO camper_acudiente ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM camper_acudiente";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $campers= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $campers;
        }
        public function loadDataByIdCamper($id){
            
            $sql = "SELECT * FROM camper_acudiente WHERE id_camper=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $acudiente= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $acudiente;
        }

        public function deleteDataByIdAcudiente($id){
            $sql = "DELETE FROM camper_acudiente where id_acudiente = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>