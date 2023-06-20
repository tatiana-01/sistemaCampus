<?php 
    namespace Models;
    class Persona {

        //definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_persona', 'foto_persona', 'persona_nombre', 'persona_apellido', 'fecha_nacimiento', 'email', 'id_ciudad', 'id_eps', 'id_rol'];
        private $id_persona;
        private $foto_persona;
        private $persona_nombre;
        private $persona_apellido;
        private $fecha_nacimiento;
        private $email;
        private $id_ciudad;
        private $id_eps;
        private $id_rol;

        public function __construct($args = [])
        {
            $this -> id_persona = $args['id_persona'] ?? '';
            $this -> foto_persona = $args['foto_persona'] ?? '';
            $this -> persona_nombre = $args['persona_nombre'] ?? '';
            $this -> persona_nombre = $args['persona_apellido'] ?? '';
            $this -> fecha_nacimiento = $args['fecha_nacimiento'] ?? '';
            $this -> email = $args['email'] ?? '';
            $this -> id_ciudad = $args['id_ciudad'] ?? '';
            $this -> id_eps = $args['id_eps'] ?? '';
            $this -> id_eps = $args['id_rol'] ?? '';
        }

        //definimos la funcion para guardarlos en la base de datos (insertar datos)
        public function saveData($data)
        {
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO personas ($cols) VALUES ($valorCols)";
            $stmt = self::$conn->prepare($sql);

            try {
                $stmt->execute($data);
                $response = [[
                    //'id_persona' => self::$conn->lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'id_persona' => $data['id_persona'],
                    'foto_persona' => $data['foto_persona'],
                    'persona_nombre' => $data['persona_nombre'],
                    'persona_apellido' => $data['persona_apellido'],
                    'fecha_nacimiento' => $data['fecha_nacimiento'],
                    'email' => $data['email'],
                    'id_ciudad' => $data['id_ciudad'],
                    'id_eps' => $data['id_eps'],
                    'id_rol' => $data['id_rol']
                ]];

            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e->getMessage();
            }
            return $response;
        }

        //para traer los datos del la base de datos para verla en el HTML
        public function loadAllData()
        {
            $sql = "SELECT id_persona, foto_persona, persona_nombre, persona_apellido, fecha_nacimiento, email, id_ciudad, id_eps, id_rol FROM personas";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para traer datos de la base de datos poa id
        public function loadByIdData($id)
        {
            $sql = "SELECT id_persona, foto_persona, persona_nombre, persona_apellido, fecha_nacimiento, email, id_ciudad, id_eps, id_rol FROM personas WHERE id_rol = $id";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para borrar datos de la base de datos
        public function deleteData($id)
        {
            $sql = "DELETE FROM personas WHERE id_persona = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data)
        {
            $sql = "UPDATE personas SET foto_persona = :foto_persona, persona_nombre = :persona_nombre, persona_apellido = :persona_apellido, fecha_nacimiento = :fecha_nacimiento, email = :email, id_ciudad = :id_ciudad, id_eps = :id_eps, id_rol = :id_rol WHERE id_persona = :id";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':foto_persona', $data['foto_persona']);
            $stmt->bindParam(':persona_nombre', $data['persona_nombre']);
            $stmt->bindParam(':persona_apellido', $data['persona_apellido']);
            $stmt->bindParam(':fecha_nacimiento', $data['fecha_nacimiento']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':id_ciudad', $data['id_ciudad']);
            $stmt->bindParam(':id_eps', $data['id_eps']);
            $stmt->bindParam(':id_rol', $data['id_rol']);
            $stmt->bindParam(':id', $data['id_persona']);
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
                if ($columna === 'id_persona') continue;
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