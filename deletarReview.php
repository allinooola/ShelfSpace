<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require "conexao.php";

// Recebe o id da review que vai ser deletada
if (isset($_GET['id'])) {
    $id_review = $_GET['id'];

    // Faz uma procura no banco de dados para pegar o id_usuario da review
    $sql = "SELECT id_usuario FROM review WHERE id_review = $id_review";
    $resultado = mysqli_query($conexao, $sql);
    // Pega o resultado da consulta
    $review = mysqli_fetch_assoc($resultado);

    // Faz a comparação se o usuario é o mesmo que criou a review
    if ($review && $review['id_usuario'] == $_SESSION['id_usuario']) {
        // Deleta a review
        $sql = "DELETE FROM review WHERE id_review = $id_review";
        mysqli_query($conexao, $sql);
    }
}

header("Location: reviews.php");
exit();
?>
