<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ShelfSpace 📚</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="login-hero">
        <div class="login-card">
            <h1>SHELFSPACE 📚</h1>
            <p>Bem-vindo! Faça login para continuar.</p>

            <!-- Exibe mensagens de SUCESSO no login e ERRO no login -->
            <?php if (isset($_GET['sucesso'])): ?>
                <p style="color:green; text-align:center;">Conta criada! Faça login.</p>
            <?php endif; ?>

            <?php if (isset($_GET['erro'])): ?>
                <p style="color:red; text-align:center;">Email ou senha inválidos!</p>
            <?php endif; ?>

            <form action="autenticar.php" method="POST">
                <label for="email">Email:</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email"
                    required>
                <label for="senha">Senha:</label>
                <input 
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="Senha"
                    required>
                <button type="submit">Entrar</button>
            </form>

            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
    </section>
</body>
</html>