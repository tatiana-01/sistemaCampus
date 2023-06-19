<?php
    namespace Models;
    class ContactoEmpleado{
        protected static $conn;
        protected static $columnsTbl=['id_contacto_empleado','tipo_id','nombre_contacto_empleado','tipo_locacion_contacto','telefono_contacto_empleado','id_empleado'];
        
        private $id_contacto_empleado;
        private $tipo_id;
        private $nombre_contacto_empleado;
        private $tipo_locacion_contacto;
        private $telefono_contacto_empleado;
        private $id_empleado;
        
       
        public function __construct($args = []){
            $this->nombre_contacto_empleado = $args['nombre_contacto_empleado'] ?? '';
            $this->tipo_id = $args['tipo_id'] ?? '';
            $this->id_contacto_empleado = $args['id_contacto_empleado'] ?? '';
            $this->tipo_locacion_contacto = $args['tipo_locacion_contacto'] ?? '';
            $this->telefono_contacto_empleado = $args['telefono_contacto_empleado'] ?? '';
            $this->id_empleado = $args['id_empleado'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO contacto_empleado ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM contacto_empleado";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $campers= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $campers;
        }
        public function loadDataByIdEmpleado($id){
            
            $sql = "SELECT * FROM contacto_empleado WHERE id_empleado=$id ";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $contacto= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $contacto;
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>