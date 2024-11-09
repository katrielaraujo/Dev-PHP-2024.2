<?php

require_once 'controllers/AssociadoController.php';
require_once 'controllers/AnuidadeController.php';


$associadoController = new AssociadoController($pdo);
$anuidadeController = new AnuidadeController($pdo);

$rota = $_GET['rota'] ?? '';
$metodo = $_SERVER['REQUEST_METHOD'];


switch ($rota) {
    case 'associados':
        if ($metodo === 'GET') {
            $associados = $associadoController->listarAssociados();
            include 'views/associados.php';
        }
        break;

    case 'associado/cadastrar':
        if ($metodo === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $cpf = $_POST['cpf'] ?? '';
            $data_filiacao = $_POST['data_filiacao'] ?? '';
            $associadoController->cadastrarAssociado($nome, $email, $cpf, $data_filiacao);
            header("Location: index.php?rota=associados");
        } else {
            include 'views/associado_create.php';
        }
        break;

    case 'anuidades':
        if ($metodo === 'GET') {
            $anuidades = $anuidadeController->listarAnuidades();
            include 'views/anuidades.php';
        }
        break;

    case 'anuidade/cadastrar':
        if ($metodo === 'POST') {
            $ano = $_POST['ano'] ?? '';
            $valor = $_POST['valor'] ?? '';
            $anuidadeController->cadastrarAnuidade($ano, $valor);
            header("Location: index.php?rota=anuidades");
        } else {
            include 'views/anuidade_create.php';
        }
        break;

    case 'anuidade/pagar':
        if ($metodo === 'POST') {
            $anuidadeId = $_POST['id'] ?? '';
            $associadoId = $_POST['assoc_id'] ?? '';
            $anuidadeController->confirmarPagamento($anuidadeId, $associadoId);
            header("Location: index.php?rota=associados");
        }
        break;

    default:
        http_response_code(404);
        echo "Rota não encontrada";
        break;
}
?>
