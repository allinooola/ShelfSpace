<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require "conexao.php";


// BUSCA A REVIEW 
if (isset($_GET['id'])) {
    $id_review = $_GET['id'];
    // Faz uma procura no banco de dados para pegar o id_usuario da review
    $sql = "SELECT * FROM review WHERE id_review = $id_review";
    $resultado = mysqli_query($conexao, $sql);
    $review = mysqli_fetch_assoc($resultado);

    if ($review && $review['id_usuario'] == $_SESSION['id_usuario']) {
            header("Location: reviews.php");
            exit();
        }

}
// PROCESSO DE SALVAR A REVIEW EDITADA

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_review = $_POST['id_review'];
    $nome_livro = $_POST['livro'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $nota = $_POST['nota'];
    $comentario = $_POST['review'];

    $sql = "UPDATE review
            SET nome_livro = '$nome_livro',
                autor = '$autor',
                genero = '$genero',
                nota = '$nota',
                comentario = '$comentario'
            WHERE id_review = $id_review
            AND id_usuario = ".$_SESSION['id_usuario'];

    mysqli_query($conexao, $sql);

    header("Location: reviews.php");
    exit();
}

mysqli_close($conexao);
?>