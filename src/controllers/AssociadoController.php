<?php
require_once(__DIR__ . '/../config/db_connect.php');
require_once(__DIR__ . '/../models/Associado.php');

class AssociadoController {
    private $model;

    public function __construct($pdo){
        $this->model = new Associado($pdo);
    }

    public function listarAssociados(){
        return $this->model->listarAssociados();
    }

    public function cadastrarAssociado($nome, $email, $cpf, $data_filiacao){
        if($this->model->cadastrarAssociado($nome, $email, $cpf, $data_filiacao)){
            echo json_encode(["status" => "Associado cadastrado com sucesso!"]);
        } else {
            echo json_encode(["status" => "Erro ao cadastrar associado."]);
        }
    }

    public function buscarAssociadoPorId($id){
        return $this->model->buscarAssociadoPorId($id);
    }
}

?>