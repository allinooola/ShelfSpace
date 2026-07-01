<?php
session_start();
require "conexao.php";

// =========================
// RECEBE OS DADOS DO FORMULÁRIO VIA POST
// Igual ao exemplo da aula: $_POST["campo"]
// =========================
$email = $_POST["email"];
$senha = $_POST["senha"];

// =========================
// BUSCA O USUÁRIO NO BANCO PELO EMAIL
// =========================
$sql = "SELECT id_usuario, nome, senha, tipo FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);

// Verifica se encontrou algum usuário com esse email
if (mysqli_num_rows($resultado) == 1) {

    // Pega os dados do usuário encontrado
    $usuario = mysqli_fetch_assoc($resultado);

    // =========================
    // VERIFICA A SENHA
    // password_verify() compara a senha digitada com o hash salvo no banco
    // =========================
    if (password_verify($senha, $usuario["senha"])) {

        // Senha correta! Inicia as variáveis de sessão
        // Igual ao exemplo da aula: $_SESSION["variavel"] = valor
        $_SESSION["id_usuario"]  = $usuario["id_usuario"];
        $_SESSION["nome"]        = $usuario["nome"];
        $_SESSION["tipo"]        = $usuario["tipo"];

        // Redireciona para a página inicial
        header("Location: index.html");
        exit();

    } else {
        // Senha errada — volta para o login com erro
        header("Location: login.php?erro=senha_invalida");
        exit();
    }

} else {
    // Email não encontrado — volta para o login com erro
    header("Location: login.php?erro=usuario_nao_encontrado");
    exit();
}

mysqli_close($conexao);
?>