<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require "conexao.php";

// Variáveis do formulário
$nome_livro = "";
$autor = "";
$genero = "";
$nota = "";
$comentario = "";

// Variável para saber se está editando
$editando = false;

if (isset($_GET['id'])) {

    // SE HOUVER UM ID NA URL, ENTAO ESTAMOS EDITANDO UMA REVIEW EXISTENTE
    $editando = true;
    $id_review = $_GET['id'];

    $sql = "SELECT * FROM review WHERE id_review = $id_review";
    $resultado = mysqli_query($conexao, $sql);
    $review = mysqli_fetch_assoc($resultado);

    if ($review && $review['id_usuario'] == $_SESSION['id_usuario']) {

        $nome_livro = $review['nome_livro'];
        $autor = $review['autor'];
        $genero = $review['genero'];
        $nota = $review['nota'];
        $comentario = $review['comentario'];

    } else {

        header("Location: reviews.php");
        exit();

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envie sua Review | ShelfSpace</title>

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
            <li><a href="logout.php" class="logout" onclick="return confirm('Tem certeza de que deseja sair?')"> Logout</a></li>
        </ul>
    </nav>
</header>

<main>

    <section class="form-section">

        <h1>Envie sua Review</h1>
        <p>Compartilhe sua opinião sobre um livro que marcou sua leitura.</p>

        <!-- Encaminhando endereços -->
        <form id="reviewForm" action="<?php echo $editando ? 'editarReview.php' : 'salvarReview.php'; ?>" method="POST">

            <!-- Se estiver editando, incluir o campo oculto com o id da review -->
            <?php if ($editando): ?>
                <input type="hidden" name="id_review" value="<?php echo $id_review; ?>">
            <?php endif; ?>

            <label for="livro">Título do livro:</label>
            <input type="text" id="livro" name="livro" value="<?php echo $nome_livro; ?>" required>

            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="<?php echo $autor; ?>" required>

            <label for="genero">Gênero:</label>
            <select id="genero" name="genero" required>
                <option value="">Selecione um gênero</option>
                <option value="Romance"<?php if ($genero == "Romance") echo " selected"; ?>>Romance</option> 
                <option value="Fantasia"<?php if ($genero == "Fantasia") echo " selected"; ?>>Fantasia</option>
                <option value="Ficção Científica"<?php if ($genero == "Ficção Científica") echo " selected"; ?>>Ficção Científica</option>
                <option value="Mistério"<?php if ($genero == "Mistério") echo " selected"; ?>>Mistério</option>
                <option value="Terror"<?php if ($genero == "Terror") echo " selected"; ?>>Terror</option>
                <option value="Drama"<?php if ($genero == "Drama") echo " selected"; ?>>Drama</option>
                <option value="Poesia"<?php if ($genero == "Poesia") echo " selected"; ?>>Poesia</option>
                <option value="Autoajuda"<?php if ($genero == "Autoajuda") echo " selected"; ?>>Autoajuda</option>
                <option value="Young Adult"<?php if ($genero == "Young Adult") echo " selected"; ?>>Young Adult</option>
                <option value="Thriller"<?php if ($genero == "Thriller") echo " selected"; ?>>Thriller</option>
                <option value="Biografia"<?php if ($genero == "Biografia") echo " selected"; ?>> Biografia</option>
                <option value="Clássicos"<?php if ($genero == "Clássicos") echo " selected"; ?>>Clássicos</option>
            </select>

            <label for="nota">Nota:</label>
            <select id="nota" name="nota" required>
                <option value="">Selecione uma nota</option>
                <option value="1"<?php if ($nota == 1) echo " selected"; ?>>1 estrela</option>
                <option value="2"<?php if ($nota == 2) echo " selected"; ?>>2 estrelas</option>
                <option value="3"<?php if ($nota == 3) echo " selected"; ?>>3 estrelas</option>
                <option value="4"<?php if ($nota == 4) echo " selected"; ?>>4 estrelas</option>
                <option value="5"<?php if ($nota == 5) echo " selected"; ?>>5 estrelas</option>
            </select>

            <label for="review">Sua review:</label>
            <textarea id="review" name="review" rows="6" required><?php echo $comentario; ?></textarea>

            <div class="checkbox-area">
                <input type="checkbox" id="confirmacao" name="confirmacao" value="sim" required>
                <label for="confirmacao">Confirmo que quero enviar minha review.</label>
            </div>

            <p id="mensagemErro"></p>

            <button type="submit">
                <?php echo $editando ? 'Editar Review' : 'Enviar Review'; ?>
            </button>

        </form>

    </section>

</main>

<footer>
    <p>📚 ShelfSpace — sua biblioteca digital</p>
    <p>Desenvolvido por Lara Vitória • 2026</p>
</footer>

<script src="js/script.js"></script>

</body>
</html>