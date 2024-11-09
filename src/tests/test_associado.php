<?php
require_once '../db_connect.php';
require_once '../models/Associado.php';

$model = new Associado($pdo);

// Teste de cadastro
echo "Testando cadastro de associado... ";
if ($model->cadastrarAssociado('Teste', 'teste@teste.com', '12345678901', '2024-01-01')) {
    echo "OK\n";
} else {
    echo "Falhou\n";
}

// Teste de listagem
echo "Testando listagem de associados... ";
$associados = $model->listarAssociados();
if (!empty($associados)) {
    echo "OK\n";
} else {
    echo "Falhou\n";
}
?>
