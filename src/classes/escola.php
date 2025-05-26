<?php
 
require_once "db/db.php";
 
class Escola {
    public $nome;
    public $endereco;
    public $cidade;
    private $cnpj;
 
    // Construtor com validação
    public function __construct($nome, $endereco, $cidade, $cnpj) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (empty($endereco)) {
            throw new Exception("O campo Endereço é obrigatório.");
        }
        if (empty($cidade)) {
            throw new Exception("O campo Cidade é obrigatório.");
        }
        if (empty($cnpj)) {
            throw new Exception("O campo CNPJ é obrigatório.");
        }
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->cnpj = $cnpj;
    }
 
    // Getter do CNPJ (encapsulamento)
    public function getCnpj() {
        return $this->cnpj;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome da escola: <strong>$this->nome</strong><br>";
        echo "Endereço: <strong>$this->endereco</strong><br>";
        echo "Cidade: <strong>$this->cidade</strong><br>";
        echo "CNPJ: <strong>" . $this->getCnpj() . "</strong></p>";
    }
 
    // Método para cadastrar a escola no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO escola (nome, endereco, cidade, cnpj) VALUES (:nome, :endereco, :cidade, :cnpj)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':cnpj', $this->cnpj);
 
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
        // Método para listar as escolas
    public static function listar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "SELECT * FROM escola";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}