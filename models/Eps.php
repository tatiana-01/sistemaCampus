<?php 
    namespace Models;
    class Eps {

        //definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_eps', 'eps_nombre'];
        private $id_eps;
        private $eps_nombre;

        public function __construct($args = [])
        {
            $this->id_eps = $args['id_eps'] ?? '';
            $this->eps_nombre = $args['eps_nombre'] ?? '';
        }

        //definimos la funcion para guardarlos en la base de datos (insertar datos)
        public function saveData($data)
        {
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO eps ($cols) VALUES ($valorCols)";
            $stmt = self::$conn->prepare($sql);

            try {
                $stmt->execute($data);
                $response = [[
                    'id_eps' => self::$conn->lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'eps_nombre' => $data['eps_nombre']
                ]];
            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e->getMessage();
            }
            return $response;
        }

        //para traer los datos del la base de datos para verla en el HTML
        public function loadAllData()
        {
            $sql = "SELECT id_eps, eps_nombre FROM eps";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para traer datos de la base de datos poa id
        public function loadByIdData($id)
        {
            $sql = "SELECT id_eps, eps_nombre FROM eps WHERE id_eps = $id";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para borrar datos de la base de datos
        public function deleteData($id)
        {
            $sql = "DELETE FROM eps WHERE id_eps = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data)
        {
            $sql = "UPDATE eps SET eps_nombre = :eps_nombre WHERE id_eps = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':eps_nombre', $data['eps_nombre']);
            $stmt->bindParam(':id', $data['id_eps']);
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
                if ($columna === 'id_eps') continue;
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