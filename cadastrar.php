<?php
session_start();
require "conexao.php";

// Recebe os dados do formulário via POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];


// VALIDAÇÕES
// Verifica se as senhas coincidem
if ($senha !== $confirmar_senha) {
    header("Location: cadastro.php?erro=senhas_diferentes");
    exit();
}

// Verifica se o email já está cadastrado
$sql_verificar = "SELECT id_usuario FROM usuario WHERE email = ?";
$stmt = mysqli_prepare($conexao, $sql_verificar);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    header("Location: cadastro.php?erro=email_existe");
    exit();
}

mysqli_stmt_close($stmt);


// CRIPTOGRAFA A SENHA
// Gera um hash seguro automaticamente
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);


// INSERT NO BANCO
$sql_inserir = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql_inserir);
mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha_hash);

if (mysqli_stmt_execute($stmt)) {
    // Cadastro ok — redireciona para login com mensagem de sucesso
    header("Location: login.php?sucesso=cadastro_ok");
    exit();
} else {
    // Erro ao inserir — redireciona com erro
    header("Location: cadastro.php?erro=erro_cadastro");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>