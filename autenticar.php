<?php
session_start();
require "conexao.php";

// RECEBE OS DADOS DO FORMULÁRIO VIA POST
$email = $_POST["email"];
$senha = $_POST["senha"];

// BUSCA O USUÁRIO NO BANCO PELO EMAIL
$sql = "SELECT id_usuario, nome, senha, tipo FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);

// Verifica se encontrou algum usuário com esse email
if (mysqli_num_rows($resultado) == 1) {

    // Pega os dados do usuário encontrado
    $usuario = mysqli_fetch_assoc($resultado);

    // VERIFICA A SENHA
    if (password_verify($senha, $usuario["senha"])) {

        // Se a senha estiver certa, inicia as variáveis de sessão
        $_SESSION["id_usuario"]  = $usuario["id_usuario"];
        $_SESSION["nome"]        = $usuario["nome"];
        $_SESSION["tipo"]        = $usuario["tipo"];

        // Redireciona para a página inicial
        header("Location: index.php");
        exit();

    }
}
        // Se o login falhar, redireciona de volta para a página de login com uma mensagem de erro
        header("Location: login.php?erro=senha_ou_email_invalido");
        exit();
?>