<?php
$host = getenv('DB_HOST') ?: 'db';
$db = getenv('DB_NAME') ?: 'devs_do_rn';
$user = getenv('DB_USER') ?: 'postgres';
$pass = getenv('DB_PASS') ?: '12345';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

?>