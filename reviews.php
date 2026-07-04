<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require "conexao.php";
 
$sql = "SELECT review.id_review, review.id_usuario, review.nome_livro, review.autor,
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
            <li><a href="index.php">Home</a></li>
            <li><a href="lidos.php">Lidos</a></li>
            <li><a href="lista.php">Lista de leitura</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="form.php">Enviar Review</a></li>
            <li><a href="about.php">Sobre</a></li>
            <li><a href="#" class="nav-conta">Minha Conta</a></li>
            <li><a href="logout.php" class="logout" onclick="return confirm('Tem certeza de que deseja sair?')"> Logout</a></li>
        </ul>
    </nav>
</header>

<main>

    <section class="page-title">
        <h1>Reviews literárias</h1>
        <p>Veja algumas opiniões sobre livros que fazem parte da nossa estante.</p>
    </section>

    <div class="review-list">
        <?php
        // Verifica se há reviews aprovadas e exibe cada uma delas
        if (mysqli_num_rows($resultado) > 0) {
 
            while ($review = mysqli_fetch_assoc($resultado)) {
 
                // Transforma a nota (número, ex: 4) em estrelinhas ⭐⭐⭐⭐
                $estrelas = str_repeat("⭐", $review['nota']);
        ?>
 
                <div class="review-card">
                    <!-- exibe uma review vinda do banco de dados -->
                    <h3><?php echo htmlspecialchars($review['nome_livro']); ?></h3>
                    <p class="review-autor-livro"><?php echo htmlspecialchars($review['autor']); ?></p>
                    <p><strong>Nota:</strong> <?php echo $estrelas; ?></p>
                    <!-- nlbr para manter o comentario bonitinho com quebras de linha -->
                    <p><?php echo nl2br(htmlspecialchars($review['comentario'])); ?></p>
                    <p class="review-por">Por: <?php echo htmlspecialchars($review['nome_usuario']); ?></p>

                    <?php if ($review['id_usuario'] == $_SESSION['id_usuario']) { ?>
                        <div class="review-card-acoes">
                            <span class="editar-review">
                                📝 <a href="editarReview.php?id=<?php echo $review['id_review']; ?>">Editar</a>
                            </span>

                            <span class="deletar-review">
                                🗑️ <a href="deletarReview.php?id=<?php echo $review['id_review']; ?>"
                                    onclick="return confirm('Tem certeza de que deseja deletar esta review?')">
                                    Deletar
                                </a>
                            </span>
                        </div>
                    <?php } ?>


                </div>
                <?php
            }
 
        } else {
            // Se não veio nenhuma linha, mostra uma mensagem em vez de nada
            echo "<p>Ainda não há reviews aprovadas por aqui. Seja a primeira a escrever uma!</p>";
        }
        
        ?>
    </div>

    <section class="chamada-review">
    <h2>Também quer participar?</h2>
    <p>Compartilhe sua opinião sobre um livro que marcou sua leitura.</p>
    <a href="form.php" class="botao-principal">Escrever Review</a>
    </section>

</main>

<footer>
    <p>📚 ShelfSpace — sua biblioteca digital</p>
    <p>Desenvolvido por Lara Vitória • 2026</p>
</footer>

</body>
</html>