<?php 
    namespace Models;
    class Ciudad {

        //definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_ciudad', 'ciudad_nombre', 'id_region'];
        private $id_ciudad;
        private $ciudad_nombre;
        private $id_region;

        public function __construct($args = [])
        {
            $this->id_ciudad = $args['id_ciudad'] ?? '';
            $this->ciudad_nombre = $args['ciudad_nombre'] ?? '';
            $this->id_region = $args['id_region'] ?? '';
        }

        //definimos la funcion para guardarlos en la base de datos (insertar datos)
        public function saveData($data)
        {
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO ciudad ($cols) VALUES ($valorCols)";
            $stmt = self::$conn->prepare($sql);

            try {
                $stmt->execute($data);
                $response = [[
                    'id_ciudad' => self::$conn->lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'ciudad_nombre' => $data['ciudad_nombre']
                ]];
            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e->getMessage();
            }
            return $response;
        }

        //para traer los datos del la base de datos para verla en el HTML
        public function loadAllData()
        {
            $sql = "SELECT id_ciudad, ciudad_nombre, id_region FROM ciudad";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para borrar datos de la base de datos
        public function deleteData($id)
        {
            $sql = "DELETE FROM ciudad WHERE id_ciudad = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data)
        {
            $sql = "UPDATE ciudad SET ciudad_nombre = :ciudad_nombre, id_region = :id_region WHERE id_ciudad = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':ciudad_nombre', $data['ciudad_nombre']);
            $stmt->bindParam(':id_region', $data['id_region']);
            $stmt->bindParam(':id', $data['id_ciudad']);
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
                if ($columna === 'id_ciudad') continue;
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