<?php
require __DIR__ . "/../classes/curso.php";

//Inicializa as variaveis
$titulo = $horas = $dias = $alunos = "";
$cursoCriado = false;
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $horas = $_POST["horas"];
    $dias = $_POST["dias"];
   
    try {
        $curso = new Curso($titulo, $horas, $dias);
        $cursoCriado = $curso->cadastrar();
 
        if ($cursoCriado) {
            echo "<div class='alert alert-success mt-3'>Cadastro efetuado com sucesso</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Erro ao cadastrar o curso</div>";
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}

$cursos = Curso::listar();

?>

<h2>Cadastro do Curso</h2>
 
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="titulo" class="form-label">titulo:</label>
        <input type="text" name="titulo" id="titulo" class="form-control"
            value="<?= htmlspecialchars($titulo) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="horas" class="form-label">Horas:</label>
        <input type="number" name="horas" id="horas" class="form-control"
            value="<?= htmlspecialchars($horas) ?>">
    </div>
 
    <div class="col-md-1">
        <label for="dias" class="form-label">Dias:</label>
        <input type="number" name="dias" id="dias" class="form-control"
            value="<?= htmlspecialchars($dias) ?>">
    </div>
 
    <div class="col-md-3">
        <label for="alunos" class="form-label">Aluno:</label>
        <input type="text" name="alunos" id="alunos" class="form-control"
            value="<?= htmlspecialchars($alunos) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>

       <h3>Lista de Cursos</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>titulo</th>
            <th>horas</th>
            <th>dias</th>
        </tr>
    </thead>
    <tbody>
       <?php if ($cursos && count($cursos) > 0): ?>
            <?php foreach ($cursos as $curso): ?>
                <tr>
                    <td><?= htmlspecialchars($curso['titulo']) ?></td>
                    <td><?= htmlspecialchars($curso['horas']) ?></td>
                    <td><?= htmlspecialchars($curso['dias']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum curso cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</form>

