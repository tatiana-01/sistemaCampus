<?php
    namespace Models;
    class Region {

        //definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_region', 'nombre_region', 'id_pais'];
        private $id_region;
        private $nombre_region;
        private $id_pais;

        public function __construct($args = [])
        {
            $this -> id_region = $args['id_region'] ?? '';
            $this -> nombre_region = $args['nombre_region'] ?? '';
            $this -> id_pais = $args['id_pais'] ?? '';
        }

        //definimos la funcion para guardarlos en la base de datos (insertar datos)
        public function saveData($data)
        {
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO regiones ($cols) VALUES ($valorCols)";
            $stmt = self::$conn->prepare($sql);

            try {
                $stmt->execute($data);
                $response = [[
                    'id_region' => self::$conn->lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'nombre_region' => $data['nombre_region']
                ]];
            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e->getMessage();
            }
            return $response;
        }

        //para traer los datos del la base de datos para verla en el HTML
        public function loadAllData()
        {
            $sql = "SELECT id_region, nombre_region, id_pais FROM regiones";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para borrar datos de la base de datos
        public function deleteData($id)
        {
            $sql = "DELETE FROM regiones WHERE id_region = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data)
        {
            $sql = "UPDATE regiones SET nombre_region = :nombre_region, id_pais = :id_pais WHERE id_region = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':nombre_region', $data['nombre_region']);
            $stmt->bindParam(':id_pais', $data['id_pais']);
            $stmt->bindParam(':id', $data['id_region']);
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
                if ($columna === 'id_region') continue;
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
