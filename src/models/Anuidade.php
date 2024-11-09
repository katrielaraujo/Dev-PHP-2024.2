<?php 
class Anuidade {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function listarAnuidades(){
        $stmt = $this->pdo->query("SELECT * FROM anuidades ORDER BY ano DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrarAnuidade($ano, $valor){
        $sql = "INSERT INTO anuidades (ano, valor) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$ano, $valor]);
    }

    public function buscarAnuidadePorAno($ano){
        $sql = "SELECT * FROM anuidades WHERE ano = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ano]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarValorAnuidade($ano, $novoValor){
        $sql = "UPDATE anuidades SET valor = ? WHERE ano = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$novoValor, $ano]);
    }
}

?>