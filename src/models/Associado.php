<?php 
class Associado {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function listarAssociados(){
        $stmt = $this->pdo->query("SELECT * FROM associados ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrarAssociado($nome, $email, $cpf, $data_filiacao){
        $sql = "INSERT INTO associados (nome, email, cpf, data_filiacao) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $cpf, $data_filiacao]);
    }

    public function buscarAssociadoPorId($id){
        $sql = "SELECT * FROM associados WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>