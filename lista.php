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
    <title>Lista de Leitura | ShelfSpace</title>
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

    <!-- HERO -->
    <section class="hero-lista">
        <h1>Lista de Leitura</h1>
        <p>Os títulos que mais aparecem nas listas de leitura dos nossos leitores.</p>
    </section>

    <!-- LISTA DE LIVROS -->
    <section class="lista-section">

        <div class="lista-container">

            <!-- REBECCA YARROS -->
            <div class="lista-grupo">
                <h2 class="lista-grupo-titulo">📖 Fantasia & Romance</h2>
                <ul class="lista-livros">
                    <li class="lista-item">
                        <div class="lista-numero">01</div>
                        <div class="lista-info">
                            <span class="lista-titulo">Fourth Wing</span>
                            <span class="lista-autor">Rebecca Yarros</span>
                        </div>
                        <span class="lista-genero">Fantasia/Romance</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">02</div>
                        <div class="lista-info">
                            <span class="lista-titulo">Iron Flame</span>
                            <span class="lista-autor">Rebecca Yarros</span>
                        </div>
                        <span class="lista-genero">Fantasia/Romance</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">03</div>
                        <div class="lista-info">
                            <span class="lista-titulo">Onyx Storm</span>
                            <span class="lista-autor">Rebecca Yarros</span>
                        </div>
                        <span class="lista-genero">Fantasia/Romance</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">04</div>
                        <div class="lista-info">
                            <span class="lista-titulo">Seis de Corvos</span>
                            <span class="lista-autor">Leigh Bardugo</span>
                        </div>
                        <span class="lista-genero">Fantasia/YA</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">05</div>
                        <div class="lista-info">
                            <span class="lista-titulo">A Rainha Vermelha</span>
                            <span class="lista-autor">Victoria Aveyard</span>
                        </div>
                        <span class="lista-genero">YA/Fantasia</span>
                    </li>
                </ul>
            </div>

            <!-- SAGA DA SELEÇÃO -->
            <div class="lista-grupo">
                <h2 class="lista-grupo-titulo">👑 Saga da Seleção</h2>
                <ul class="lista-livros">
                    <li class="lista-item">
                        <div class="lista-numero">06</div>
                        <div class="lista-info">
                            <span class="lista-titulo">A Seleção</span>
                            <span class="lista-autor">Kiera Cass</span>
                        </div>
                        <span class="lista-genero">YA/Romance</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">07</div>
                        <div class="lista-info">
                            <span class="lista-titulo">A Elite</span>
                            <span class="lista-autor">Kiera Cass</span>
                        </div>
                        <span class="lista-genero">YA/Romance</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">08</div>
                        <div class="lista-info">
                            <span class="lista-titulo">A Escolhida</span>
                            <span class="lista-autor">Kiera Cass</span>
                        </div>
                        <span class="lista-genero">YA/Romance</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">09</div>
                        <div class="lista-info">
                            <span class="lista-titulo">A Herdeira</span>
                            <span class="lista-autor">Kiera Cass</span>
                        </div>
                        <span class="lista-genero">YA/Romance</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">10</div>
                        <div class="lista-info">
                            <span class="lista-titulo">A Coroa</span>
                            <span class="lista-autor">Kiera Cass</span>
                        </div>
                        <span class="lista-genero">YA/Romance</span>
                    </li>
                </ul>
            </div>

            <!-- OUTROS -->
            <div class="lista-grupo">
                <h2 class="lista-grupo-titulo">🌙 Outros</h2>
                <ul class="lista-livros">
                    <li class="lista-item">
                        <div class="lista-numero">11</div>
                        <div class="lista-info">
                            <span class="lista-titulo">Pelas Entranhas</span>
                            <span class="lista-autor">Triz Parizotto</span>
                        </div>
                        <span class="lista-genero">Terror</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">12</div>
                        <div class="lista-info">
                            <span class="lista-titulo">Daisy Jones & The Six</span>
                            <span class="lista-autor">Taylor Jenkins Reid</span>
                        </div>
                        <span class="lista-genero">Drama</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">13</div>
                        <div class="lista-info">
                            <span class="lista-titulo">Tudo que eu Sei sobre o Amor</span>
                            <span class="lista-autor">Dolly Alderton</span>
                        </div>
                        <span class="lista-genero">Memórias</span>
                    </li>
                    <li class="lista-item">
                        <div class="lista-numero">14</div>
                        <div class="lista-info">
                            <span class="lista-titulo">O Morro dos Ventos Uivantes</span>
                            <span class="lista-autor">Emily Brontë</span>
                        </div>
                        <span class="lista-genero">Clássico</span>
                    </li>
                </ul>
            </div>

        </div>
    </section>

</main>

<footer>
    <p>📚 ShelfSpace — sua biblioteca digital</p>
    <p>Desenvolvido por Lara Vitória • 2026</p>
</footer>

<script src="js/script.js"></script>

</body>
</html>