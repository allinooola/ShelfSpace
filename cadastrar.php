<?php
session_start();
require "conexao.php";

// Recebe os dados do formulário via POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];


// VALIDAÇÕES
// Verifica se as senhas batem
if ($senha !== $confirmar_senha) {
    header("Location: cadastro.php?erro=senhas_diferentes");
    exit();
}

// Verifica se o email já está cadastrado
$sql_verificar = "SELECT id_usuario FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql_verificar);

if (mysqli_num_rows($resultado) > 0) {
    header("Location: cadastro.php?erro=email_existe");
    exit();
}


// CRIPTOGRAFA A SENHA
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// INSERT NO BANCO
$sql_inserir = "INSERT INTO usuario (nome, email, senha) 
                VALUES ('$nome', '$email', '$senha_hash')";

if (mysqli_query($conexao, $sql_inserir)) {
    // Cadastro certo — redireciona para login com mensagem de sucesso
    header("Location: login.php?sucesso=cadastro_ok");
    exit();
} else {
    // Erro ao inserir: redireciona com erro
    header("Location: cadastro.php?erro=erro_cadastro");
    exit();
}

mysqli_close($conexao);
?>