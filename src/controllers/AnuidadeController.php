<?php 

require_once(__DIR__ . '/../config/db_connect.php');
require_once(__DIR__ . '/../models/Anuidade.php');


class AnuidadeController {
    private $model;

    public function __construct($pdo){
        $this->model = new Anuidade($pdo);
    }

    public function listarAnuidades(){
        return $this->model->listarAnuidades();
    }

    public function cadastrarAnuidade($ano, $valor){
        if($this->model->cadastrarAnuidade($ano, $valor)){
            echo json_encode(["status" => "Anuidade cadastrada com sucesso!"]);
        } else{
            echo json_encode(["status" => "Erro ao cadastrar anuidade."]);
        }
    }

    public function atualizarValorAnuidade($ano, $novoValor){
        if($this->model->atualizarValorAnuidade($ano, $novoValor)){
            echo json_encode(["status" => "Valor da anuidade atualizado com sucesso!"]);
        }else {
            echo json_encode(["status" => "Erro ao atualizar valor da anuidade."]);
        }
    }

    public function confirmarPagamento($anuidadeId, $associadoId) {
        $sql = "UPDATE pagamentos SET pago = TRUE, data_pagamento = NOW() WHERE anuidade_id = ? AND associado_id = ?";
        $stmt = $this->model->pdo->prepare($sql);
        if ($stmt->execute([$anuidadeId, $associadoId])) {
            echo json_encode(["status" => "Pagamento registrado com sucesso!"]);
        } else {
            echo json_encode(["status" => "Erro ao registrar pagamento."]);
        }
    }
}

?>