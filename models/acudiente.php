<?php
    namespace Models;
    class Acudiente{
        protected static $conn;
        protected static $columnsTbl=['id_acudiente','tipo_id','nombre_acudiente','parentesco','telefono_acudiente'];
        
        private $id_acudiente;
        private $tipo_id;
        private $nombre_acudiente;
        private $parentesco;
        private $telefono_acudiente;
        
       
        public function __construct($args = []){
            $this->nombre_acudiente = $args['nombre_acudiente'] ?? '';
            $this->tipo_id = $args['tipo_id'] ?? '';
            $this->id_acudiente = $args['id_acudiente'] ?? '';
            $this->parentesco = $args['parentesco'] ?? '';
            $this->telefono_acudiente = $args['telefono_acudiente'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO acudiente ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM acudiente";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $campers= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $campers;
        }
        public function loadDataById($id){
            $sql = "SELECT * FROM acudiente WHERE id_acudiente=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $acudiente= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $acudiente;
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>