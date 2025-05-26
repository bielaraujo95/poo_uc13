<?php
 
require_once "db/db.php"; // Garante a conexão com o banco
 
class Aluno {
    public $nome;
    public $nascimento;
    private $cpf;
 
    public function __construct($nome, $nascimento, $cpf) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        $anoAtual = date("Y");
        if (!filter_var($nascimento, FILTER_VALIDATE_INT) || $nascimento < 1900 || $nascimento > $anoAtual) {
            throw new Exception("O campo Nascimento deve conter um ano válido entre 1900 e $anoAtual.");
        }
        if (empty($cpf)) {
            throw new Exception("O campo CPF é obrigatório.");
        }
 
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->cpf = $cpf;
    }
 
    public function getCpf() {
        return $this->cpf;
    }
 
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "nascimento: <strong>$this->nascimento</strong> anos<br>";
        echo "CPF: <strong>" . $this->getCpf() . "</strong></p>";
    }
 
    public function cadastrar() {
        $database = new Database();
        $conn = $database->getConnection();
 
        $query = "INSERT INTO aluno (nome, nascimento, cpf) VALUES (:nome, :nascimento, :cpf)";
        $stmt = $conn->prepare($query);
 
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':cpf', $this->cpf);
 
        return $stmt->execute();
    }
    // Método para listar os alunos
    public static function listar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "SELECT * FROM aluno";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}