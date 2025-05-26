<?php
// filepath: c:\xampp\htdocs\Gabriel\poo\src\pages\login.php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
 
// Conexão com o banco
$host = 'localhost';
$db = 'projeto_poo';   // coloque aqui o nome real do seu banco
$user = 'root';          // ajuste conforme sua configuração
$pass = 'senac123';              // ajuste se tiver senha
 
$conn = new mysqli($host, $user, $pass, $db);
 
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
 
// Recebe os dados do formulário
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
 
// Consulta SQL segura
$sql = "SELECT * FROM login WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
 
// Verifica se encontrou o usuário
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
 
    // ⚠️ VERIFICAÇÃO DA SENHA
    // Supondo senha em TEXTO PLANO (recomendo usar hash no futuro)
    if ($password === $user['senha']) {
        $_SESSION['usuario'] = $user['email'];
        header("Location: /Gabriel/poo");
        exit;
    } else {
        header("Location: login.php?erro=Senha incorreta");
        exit;
    }
} else {
    header("Location: login.php?erro=E-mail não encontrado");
    exit;
}
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
 
<main class="d-flex justify-content-center align-items-center flex-grow-1">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Acesso ao Sistema</h2>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Usuário (e-mail):</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</main>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 
 
</body>
</html>