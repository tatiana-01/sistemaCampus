<?php
require_once 'vendor/autoload.php';
use App\Database;
use Models\Stack_Tecnologico;
$db = new Database();
$conn = $db->getConnection('mysql');
Stack_tecnologico::setConn($conn);

?>