<?php
    namespace Models;
    class Personas{
        protected static $conn;
        protected static $columnsTbl=['id_persona','foto_persona','persona_nombre','persona_apellido','fecha_nacimiento','email','persona_direccion','persona_telefono','id_ciudad','id_eps','id_rol','tipo_id'];
        private $id_persona;
        private $foto_persona;
        private $persona_nombre;
        private $persona_apellido;
        private $fecha_nacimiento;
        private $email;
        private $persona_direccion;
        private $persona_telefono;
        private $id_ciudad;
        private $id_eps;
        private $id_rol;
        private $tipo_id;
        public function __construct($args = []){
            $this->id_persona = $args['id_persona'] ?? '';
            $this->foto_persona = $args['foto_persona'] ?? '';
            $this->persona_nombre = $args['persona_nombre'] ?? '';
            $this->persona_apellido = $args['persona_apellido'] ?? '';
            $this->fecha_nacimiento = $args['fecha_nacimiento'] ?? '';
            $this->email = $args['email'] ?? '';
            $this->persona_direccion = $args['persona_direccion'] ?? '';
            $this->persona_telefono = $args['persona_telefono'] ?? '';
            $this->id_ciudad = $args['id_ciudad'] ?? '';
            $this->id_eps = $args['id_eps'] ?? '';
            $this->id_rol = $args['id_rol'] ?? '';
            $this->tipo_id = $args['tipo_id'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO personas ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM personas";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $personas= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $personas;
        }
        public function loadDataById($id){
            $sql = "SELECT * FROM personas WHERE id_persona=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $camper= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $camper;
        }

        public function editData($data){
            $sql = "UPDATE `personas` SET `tipo_id`=:tipo_id,`persona_nombre`=:persona_nombre, `persona_apellido`=:persona_apellido,`fecha_nacimiento`=:fecha_nacimiento, `email`=:email, `persona_direccion`=:persona_direccion, `persona_telefono`=:persona_telefono, `id_ciudad`=:id_ciudad, `id_eps`=:id_eps WHERE `id_persona`=:id_persona";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':tipo_id', $data['tipo_id'], \PDO::PARAM_STR); 
            $stmt->bindParam(':id_persona', $data['id_persona'], \PDO::PARAM_STR);
            $stmt->bindParam(':persona_nombre', $data['persona_nombre'], \PDO::PARAM_STR);
            $stmt->bindParam(':persona_apellido', $data['persona_apellido'], \PDO::PARAM_STR);
            $stmt->bindParam(':fecha_nacimiento', $data['fecha_nacimiento'], \PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
            $stmt->bindParam(':persona_direccion', $data['persona_direccion'], \PDO::PARAM_STR);
            $stmt->bindParam(':persona_telefono', $data['persona_telefono'], \PDO::PARAM_STR);
            $stmt->bindParam(':id_ciudad', $data['id_ciudad'], \PDO::PARAM_INT);
            $stmt->bindParam(':id_eps', $data['id_eps'], \PDO::PARAM_INT);
            //$stmt->bindParam(':id_empleado', $data['id_empleado'], \PDO::PARAM_INT); 
            $stmt->execute();
        }

        public function deleteData($id){
            $sql = "DELETE FROM personas where id_persona = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        
        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>