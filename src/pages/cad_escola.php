<?php
require __DIR__ . "/../classes/escola.php";

//Inicializa as variaveis
$nome = $endereco = $cidade = $cnpj = "";
$alunoCriado = false;
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $endereco = trim($_POST["endereço"]);
    $cidade = trim($_POST["cidade"]);
    $cnpj = trim($_POST["cnpj"]);
   
    try {
        $escola = new Aluno($nome, $endereco, $cidade, $cnpj);
        $alunoCriado = true;
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}
?>
 
<h2>Cadastro da Escola</h2>
 
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"
            value="<?= htmlspecialchars($nome) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="endereço" class="form-label">Endereço:</label>
        <input type="text" name="endereço" id="endereço" class="form-control"
            value="<?= htmlspecialchars($endereco) ?>">
    </div>
 
    <div class="col-md-1">
        <label for="cidade" class="form-label">Cidade:</label>
        <input type="text" name="cidade" id="cidade" class="form-control"
            value="<?= htmlspecialchars($cidade) ?>">
    </div>
 
    <div class="col-md-3">
        <label for="cnpj" class="form-label">CNPJ:</label>
        <input type="number" name="cnpj" id="cnpj" class="form-control"
            value="<?= htmlspecialchars($cnpj) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
 
<?php
if ($alunoCriado) {
    echo "<h3>Resultado:</h3>";
    $escola->exibirDados();
}
?>