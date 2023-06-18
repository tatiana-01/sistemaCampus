<?php 
    namespace Models;
    class Pais {

        //definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_pais', 'nombre_pais'];
        private $id_pais;
        private $nombre_pais;

        public function __construct($args = [])
        {
            $this -> id_pais = $args['id_pais'] ?? '';
            $this -> nombre_pais = $args['nombre_pais'] ?? '';
        }

        //definimos la funcion para guardarlos en la base de datos (insertar datos)
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO paises ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            
            try {
                $stmt -> execute($data);
                $response = [[
                    'id_pais' => self :: $conn -> lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'nombre_pais' => $data['nombre_pais']
                ]]; 
            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e -> getMessage();
            }
            return $response; 
        }

        //para traer los datos del la base de datos para verla en el HTML
        public function loadAllData() {
            $sql = "SELECT id_pais, nombre_pais FROM paises";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute();
            $miSgav = $stmt -> fetchAll(\PDO :: FETCH_ASSOC);
            return $miSgav;
        } 

        //funcion para borrar datos de la base de datos
        public function deleteData($id) {
            $sql = "DELETE FROM paises WHERE id_pais = :id";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> bindParam(':id', $id);
            $stmt -> execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data) {
            $sql = "UPDATE paises SET nombre_pais = :nombre_pais WHERE id_pais = :id";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> bindParam(':nombre_pais', $data['nombre_pais']);
            $stmt -> bindParam(':id', $data['id_pais']);
            $stmt -> execute();
        }

        //acontinuacion se escribe la funcion de sanitizacion
        //para prevenir inyesion de cosigo SQL y caracteres especiales 
        public static function setConn($connBd) {
            self :: $conn = $connBd;
        }
        
        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id_pais') continue;
                $atributos [$columna]=$this->$columna;
             }
             return $atributos;
        }

        public function sanitizarAttributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }
    }
?>