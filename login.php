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
            <a href="index.php" class="voltar-home"> Voltar para a Home</a>
            <h1>SHELFSPACE 📚</h1>
            <p>Bem-vindo! Faça login para continuar.</p>

            <form action="authenticar.php" method="POST">
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