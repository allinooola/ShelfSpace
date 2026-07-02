<?php
// PASSO 1: toda página que precisa de login começa com isso.
// session_start() "liga" a sessão pra gente poder checar quem está logado.
session_start();
 
// Se NÃO existir a variável id_usuario na sessão, quer dizer que
// a pessoa não fez login. Então mandamos ela pro login e paramos
// tudo com exit() (nada depois disso é executado).
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
 
// PASSO 2: conectar no banco (arquivo que você já tem pronto)
require "conexao.php";
 
// PASSO 3: perguntar ao banco quais reviews estão aprovadas.
// Também já aproveitamos e buscamos o nome de quem escreveu,
// juntando (JOIN) com a tabela usuario pelo id_usuario.
$sql = "SELECT review.id_review, review.nome_livro, review.autor,
               review.nota, review.comentario, review.data_review,
               usuario.nome AS nome_usuario
        FROM review
        JOIN usuario ON review.id_usuario = usuario.id_usuario
        WHERE review.status = 'aprovado'
        ORDER BY review.data_review DESC";
 
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews | ShelfSpace</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="lidos.html">Lidos</a></li>
            <li><a href="lista.html">Lista de leitura</a></li>
            <li><a href="reviews.html">Reviews</a></li>
            <li><a href="form.html">Enviar Review</a></li>
            <li><a href="about.html">Sobre</a></li>
            <li><a href="#" class="nav-conta">Minha Conta</a></li>
        </ul>
    </nav>
</header>

<main>

    <section class="page-title">
        <h1>Reviews literárias</h1>
        <p>Veja algumas opiniões sobre livros que fazem parte da nossa estante.</p>
    </section>

    <section class="review-list">

        <div class="review-card">
            <h3>A Biblioteca da Meia-Noite</h3>
            <p><strong>Nota:</strong> ⭐⭐⭐⭐</p>
            <p>Uma leitura reflexiva sobre escolhas, arrependimentos e possibilidades de vida.</p>
        </div>

        <div class="review-card">
            <h3>Jogos Vorazes</h3>
            <p><strong>Nota:</strong> ⭐⭐⭐⭐⭐</p>
            <p>Uma história envolvente, com crítica social e personagens marcantes.</p>
        </div>

        <div class="review-card">
            <h3>Orgulho e Preconceito</h3>
            <p><strong>Nota:</strong> ⭐⭐⭐⭐⭐</p>
            <p>Um clássico cheio de ironia, romance e personagens memoráveis.</p>
        </div>

    </section>

        <?php
        // PASSO 4: para cada linha que o banco devolveu, desenha um card.
        // mysqli_fetch_assoc pega "uma linha por vez" do resultado,
        // até acabar (o while para quando não tem mais linha).
 
        if (mysqli_num_rows($resultado) > 0) {
 
            while ($review = mysqli_fetch_assoc($resultado)) {
 
                // Transforma a nota (número, ex: 4) em estrelinhas ⭐⭐⭐⭐
                $estrelas = str_repeat("⭐", $review['nota']);
                ?>
 
                <div class="review-card">
                    <h3><?php echo htmlspecialchars($review['nome_livro']); ?></h3>
                    <p class="review-autor-livro"><?php echo htmlspecialchars($review['autor']); ?></p>
                    <p><strong>Nota:</strong> <?php echo $estrelas; ?></p>
                    <p><?php echo nl2br(htmlspecialchars($review['comentario'])); ?></p>
                    <p class="review-por">Por: <?php echo htmlspecialchars($review['nome_usuario']); ?></p>
                </div>
 
                <?php
            }
 
        } else {
            // Se não veio nenhuma linha, mostra uma mensagem em vez de nada
            echo "<p>Ainda não há reviews aprovadas por aqui. Seja a primeira a escrever uma!</p>";
        }
        ?>

    <section class="chamada-review">
    <h2>Também quer participar?</h2>
    <p>Compartilhe sua opinião sobre um livro que marcou sua leitura.</p>
    <a href="form.html" class="botao-principal">Escrever Review</a>
    </section>

</main>

<footer>
    <p>📚 ShelfSpace — sua biblioteca digital</p>
    <p>Desenvolvido por Lara Vitória • 2026</p>
</footer>

</body>
</html>