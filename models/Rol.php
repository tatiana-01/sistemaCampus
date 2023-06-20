<?php 
    namespace Models;
    class Rol {

        //definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_rol', 'name_rol'];
        private $id_rol;
        private $name_rol;

        public function __construct($args = [])
        {
            $this->id_rol = $args['id_rol'] ?? '';
            $this->name_rol = $args['name_rol'] ?? '';
        }

        //definimos la funcion para guardarlos en la base de datos (insertar datos)
        public function saveData($data)
        {
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO roles ($cols) VALUES ($valorCols)";
            $stmt = self::$conn->prepare($sql);

            try {
                $stmt->execute($data);
                $response = [[
                    'id_rol' => self::$conn->lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'name_rol' => $data['name_rol']
                ]];
            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e->getMessage();
            }
            return $response;
        }

        //para traer los datos del la base de datos para verla en el HTML
        public function loadAllData()
        {
            $sql = "SELECT id_rol, name_rol FROM roles";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para traer datos de la base de datos poa id
        public function loadByIdData($id)
        {
            $sql = "SELECT id_rol, name_rol FROM roles WHERE id_rol = $id";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para borrar datos de la base de datos
        public function deleteData($id)
        {
            $sql = "DELETE FROM roles WHERE id_rol = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data)
        {
            $sql = "UPDATE roles SET name_rol = :name_rol WHERE id_rol = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':name_rol', $data['name_rol']);
            $stmt->bindParam(':id', $data['id_rol']);
            $stmt->execute();
        }

        //acontinuacion se escribe la funcion de sanitizacion
        //para prevenir inyesion de cosigo SQL y caracteres especiales 
        public static function setConn($connBd)
        {
            self::$conn = $connBd;
        }

        public function atributos()
        {
            $atributos = [];
            foreach (self::$columnsTbl as $columna) {
                if ($columna === 'id_rol') continue;
                $atributos[$columna] = $this->$columna;
            }
            return $atributos;
        }

        public function sanitizarAttributos()
        {
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach ($atributos as $key => $value) {
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }
        
    }
?>