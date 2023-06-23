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
        public function deleteData($id){
            $sql = "DELETE FROM contacto_empleado where id_contacto_empleado = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function deleteDataByIdEmpleado($id){
            $sql = "DELETE FROM contacto_empleado where id_empleado = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function editData($data){
            $sql = "UPDATE `contacto_empleado` SET `tipo_id`=:tipo_id,`nombre_contacto_empleado`=:nombre_contacto_empleado, `telefono_contacto_empleado`=:telefono_contacto_empleado,`tipo_locacion_contacto`=:tipo_locacion_contacto WHERE `id_contacto_empleado`=:id_contacto_empleado";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':tipo_id', $data['tipo_id'], \PDO::PARAM_STR); 
            $stmt->bindParam(':id_contacto_empleado', $data['id_contacto_empleado'], \PDO::PARAM_STR);
            $stmt->bindParam(':nombre_contacto_empleado', $data['nombre_contacto_empleado'], \PDO::PARAM_STR);
            $stmt->bindParam(':telefono_contacto_empleado', $data['telefono_contacto_empleado'], \PDO::PARAM_STR);
            $stmt->bindParam(':tipo_locacion_contacto', $data['tipo_locacion_contacto'], \PDO::PARAM_STR);
            //$stmt->bindParam(':id_empleado', $data['id_empleado'], \PDO::PARAM_INT); 
            $stmt->execute();
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>