<?php
require_once '../db_connect.php';
require_once '../models/Anuidade.php';

$model = new Anuidade($pdo);

// Teste de cadastro
echo "Testando cadastro de anuidade... ";
if ($model->cadastrarAnuidade(2024, 150.00)) {
    echo "OK\n";
} else {
    echo "Falhou\n";
}

// Teste de listagem
echo "Testando listagem de anuidades... ";
$anuidades = $model->listarAnuidades();
if (!empty($anuidades)) {
    echo "OK\n";
} else {
    echo "Falhou\n";
}
?>
