<?php
    namespace Models;
    class Matricula{
        protected static $conn;
        protected static $columnsTbl=['id_matricula','id_camper','id_ruta'];
        
        private $id_matricula;
        private $id_camper;
        private $id_ruta;
        
       
        public function __construct($args = []){
            $this->id_camper = $args['id_camper'] ?? '';
            $this->id_matricula = $args['id_matricula'] ?? '';
            $this->id_ruta = $args['id_ruta'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO matricula_camper_rutas ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM matricula_camper_rutas";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $personas= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $personas;
        }

        public function loadDataByIdCamper($id){
            
            $sql = "SELECT * FROM matricula_camper_rutas WHERE id_camper=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $salon= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $salon;
        }

        public function editData($data){
            $sql = "UPDATE `matricula_camper_rutas` SET `id_ruta`=:id_ruta WHERE `id_camper`=:id_camper";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id_ruta', $data['id_ruta'], \PDO::PARAM_INT); 
            $stmt->bindParam(':id_camper', $data['id_camper'], \PDO::PARAM_INT); 
            $stmt->execute();
        }

        public function deleteData($id){
            $sql = "DELETE FROM matricula_camper_rutas where id_camper = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>