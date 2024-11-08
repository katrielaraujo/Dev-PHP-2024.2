<?php
$host = 'db';
$db = 'devs_do_rn';
$user = 'postgres';
$pass = '12345';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

?>