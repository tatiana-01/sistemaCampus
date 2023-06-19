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
            return $camper;
        }

        public function loadDataByIdSalon($id){
            
            $sql = "SELECT * FROM salones WHERE id_salon=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $salon= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $salon;
        }

        public function loadAllDataEps(){
            $sql = "SELECT * FROM eps";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $eps= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $eps;
        }

        public function loadDataByIdEps($id){
            
            $sql = "SELECT * FROM eps WHERE id_eps=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $eps= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $eps;
        }

        public function loadAllDataNivel(){
            $sql = "SELECT * FROM nivel_campers";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $nivel= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $nivel;
        }

        public function loadAllDataPaises(){
            $sql = "SELECT * FROM paises";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $nivel= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $nivel;
        }

        public function loadDataByIdRegiones($id){
            
            $sql = "SELECT * FROM regiones WHERE id_pais=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $regiones= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $json_regiones=json_encode($regiones);
            echo $json_regiones;
        }

        public function loadDataByIdCiudades($id){
            
            $sql = "SELECT * FROM ciudad WHERE id_region=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $ciudades= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $json_ciudades=json_encode($ciudades);
            echo $json_ciudades;
        }

        public function loadDataByIdCiudad($id){
            
            $sql = "SELECT * FROM ciudad WHERE id_ciudad=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $ciudad= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $ciudad;
        }

        public function loadDataByIdNivel($id){
            
            $sql = "SELECT * FROM nivel_campers WHERE id_nivel_camper=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $nivel= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $nivel;
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>