<?php

 require_once "db/db.php";

class Curso {
    public $titulo;
    public $horas;
    public $dias;
 
    // Construtor com validação
    public function __construct($titulo, $horas, $dias) {
        if (empty($titulo)) {
            throw new Exception("O campo Titulo é obrigatório.");
        }
        if (empty($horas)) {
            throw new Exception("Deve se conter as horas do curso.");
        }
        if (empty($dias)) {
            throw new Exception("O campo Dias é obrigatório.");
        }
       
        $this->titulo = $titulo;
        $this->horas = $horas;
        $this->dias = $dias;
       
    }
    // Getter do aluno (encapsulamento)
    public function getCurso() {
        return $this->curso;
    }
   
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Horas: <strong>$this->horas</strong> <br>";
        echo "Dias: <strong>$this->dias</strong> <br>";
    }
// Método para cadastrar a escola no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO curso (titulo, horas, dias) VALUES (:titulo, :horas, :dias)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':horas', $this->horas);
        $stmt->bindParam(':dias', $this->dias);

 
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
        // Método para listar os cursos
    public static function listar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "SELECT * FROM curso";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
 