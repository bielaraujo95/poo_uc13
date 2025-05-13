<?php
 
class Aluno {
    public $titulo;
    public $horas;
    public $dias;
    private $alunos;
 
    // Construtor com validação
    public function __construct($titulo, $horas, $dias, $alunos) {
        if (empty($titulo)) {
            throw new Exception("O campo Titulo é obrigatório.");
        }
        if (empty($horas)) {
            throw new Exception("Deve se conter as horas do curso.");
        }
        if (empty($dias)) {
            throw new Exception("O campo Dias é obrigatório.");
        }
        if (empty($alunos)) {
            throw new Exception("O campo Aluno é obrigatório.");
        }
       
        $this->titulo = $titulo;
        $this->horas = $horas;
        $this->dias = $dias;
        $this->aluno = $alunos;
       
    }
    // Getter do aluno (encapsulamento)
    public function getAluno() {
        return $this->aluno;
    }
   
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Horas: <strong>$this->horas</strong> <br>";
        echo "Dias: <strong>$this->dias</strong> <br>";
        echo "Aluno: <strong>" . $this->getAluno() . "</strong></p>";
    }
}