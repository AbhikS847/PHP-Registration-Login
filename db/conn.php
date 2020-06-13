<?php 
$host = "localhost";
$dbname = "attendance";
$username = 'root';
$passwd = '';

$dsn = "mysql:host=$host;dbname=$dbname";

try{
    $pdo = new PDO($dsn,$username,$passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}


catch(PDOException $e){
    throw new PDOException($e->getMessage());
    echo "Sorry something went wrong, please try again";
}

require_once 'crud.php';
$crud = new crud($pdo);

?>