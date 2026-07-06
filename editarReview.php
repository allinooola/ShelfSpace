<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require "conexao.php";

// PROCESSO DE SALVAR A REVIEW EDITADA

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo os dados do formulário
    $id_review = $_POST['id_review'];
    $nome_livro = $_POST['livro'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $nota = $_POST['nota'];
    $comentario = $_POST['review'];

    // Verificando se pertence ao usuário logado
    $sql = "SELECT id_usuario FROM review WHERE id_review = $id_review";
    $resultado = mysqli_query($conexao, $sql);
    $review = mysqli_fetch_assoc($resultado);

    if (!$review || $review['id_usuario'] != $_SESSION['id_usuario']) {
        header("Location: reviews.php");
        exit();
    }

    // Agora sim atualizando a review no banco de dados
    $sql = "UPDATE review
            SET nome_livro = '$nome_livro',
                autor = '$autor',
                genero = '$genero',
                nota = '$nota',
                comentario = '$comentario'
            WHERE id_review = $id_review";

    mysqli_query($conexao, $sql);
    header("Location: reviews.php");
    exit();
}

mysqli_close($conexao);
?>