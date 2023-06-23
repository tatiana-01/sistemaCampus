<?php
    namespace Models;
    class Ruta{
        protected static $conn;
        protected static $columnsTbl=['id_ruta','nombre_ruta','descripcion'];
        
        private $id_ruta;
        private $nombre_ruta;
        private $descripcion;
        
       
        public function __construct($args = []){
            $this->nombre_ruta = $args['nombre_ruta'] ?? '';
            $this->id_ruta = $args['id_ruta'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO ruta_entrenamiento ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM ruta_entrenamiento";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $rutas= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $rutas;
        }

        public function loadDataById($id){
            
            $sql = "SELECT * FROM ruta_entrenamiento WHERE id_ruta=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $ruta= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $ruta;
        }

        public function deleteData($id){
            $sql = "DELETE FROM ruta_entrenamiento where id_ruta = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        public function editData($data){
            $sql = "UPDATE `ruta_entrenamiento` SET `nombre_ruta`=:nombre_ruta,`descripcion_ruta`=:descripcion_ruta WHERE `id_ruta`=:id_ruta";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':nombre_ruta', $data['nombre_ruta'], \PDO::PARAM_STR); 
            $stmt->bindParam(':descripcion_ruta', $data['descripcion_ruta'], \PDO::PARAM_STR);
            $stmt->bindParam(':id_ruta', $data['id_ruta'], \PDO::PARAM_INT); 
            $stmt->execute();
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>

