<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require "conexao.php";

// Recebe os dados do form
$nome_livro = $_POST['livro'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$nota = $_POST['nota'];
$comentario = $_POST['review'];
$id_usuario = $_SESSION['id_usuario'];
$status = 'aprovado'; // Define o status como 'aprovado' por padrão
$data_review = date('Y-m-d H:i:s'); // Data e hora atual

$sql = "INSERT INTO review (nome_livro, autor, genero, nota, comentario, id_usuario, status, data_review) 
        VALUES ('$nome_livro', '$autor', '$genero', '$nota', '$comentario', '$id_usuario', '$status', '$data_review')";

if (mysqli_query($conexao, $sql)) {
    header("Location: reviews.php");
    exit();
} else {
    echo "Erro ao salvar a review: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>

