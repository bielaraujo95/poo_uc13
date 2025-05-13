<?php
session_start();
$page = isset ($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>UC 13 - Técnico em Informática.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">UC 13 - Compreedendo POO com PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?page=aluno">Cadastro de Aluno</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=curso">Cadastro de Curso</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=escola">Cadastro de Escola</a></li>
                </ul>
                <a href="index.php?page=login" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Sair
                    </a>
            </div>
        </div>
    </nav>

<header class="bg-primary text-white text-center py-4">
    <h1>Vamos aprender PHP</h1>
</header>
    
<main class="container my-5">