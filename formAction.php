<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Enviada | ShelfSpace</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="lidos.php">Lidos</a></li>
            <li><a href="lista.php">Lista de leitura</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="about.php">Sobre</a></li>
            <li><a href="#" class="nav-conta">Minha Conta</a></li>
        </ul>
    </nav>
</header>

<main>

    <!-- HERO -->
    <section class="resultado-hero">
        <h1>Review recebida e enviada para análise!</h1>
        <p> Quando aprovada, será publicada na página de reviews.</p>
        <p>Confira abaixo os dados enviados pelo formulário.</p>
    </section>

    <div class="resultado-content">
        <div class="resultado-card">

            <h2>📬 Resumo da sua review</h2>

            <!-- Cada div abaixo vai receber os dados via JavaScript -->
            <div class="campo-resultado">
                <span class="campo-label">Nome</span>
                <span class="campo-valor" id="resultado-nome"></span>
            </div>

            <div class="campo-resultado">
                <span class="campo-label">E-mail</span>
                <span class="campo-valor" id="resultado-email"></span>
            </div>

            <div class="campo-resultado">
                <span class="campo-label">Livro</span>
                <span class="campo-valor" id="resultado-livro"></span>
            </div>

            <div class="campo-resultado">
                <span class="campo-label">Autor</span>
                <span class="campo-valor" id="resultado-autor"></span>
            </div>

            <div class="campo-resultado">
                <span class="campo-label">Gênero</span>
                <span class="campo-valor" id="resultado-genero"></span>
            </div>

            <div class="campo-resultado">
                <span class="campo-label">Nota</span>
                <span class="campo-valor estrelas" id="resultado-nota"></span>
            </div>

            <div class="campo-resultado">
                <span class="campo-label">Review</span>
                <span class="campo-valor" id="resultado-review"></span>
            </div>

            <!-- Botão para voltar ao formulário -->
            <div class="botao-voltar">
                <a href="form.php">Enviar outra review</a>
            </div>

        </div>
    </div>

</main>

<footer>
    <p>📚 ShelfSpace — sua biblioteca digital</p>
    <p>Desenvolvido por Lara Vitória • 2026</p>
</footer>

<script src="js/script.js"></script>

</body>
</html>
