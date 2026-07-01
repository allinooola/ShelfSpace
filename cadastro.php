<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | ShelfSpace 📚</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- REUTILIZAÇÃO DO LAYOUT DE LOGIN PARA CADASTRO -->
    <section class="login-hero">
        <div class="login-card">
            <h1>SHELFSPACE 📚</h1>
            <p>Crie sua conta para começar a compartilhar suas leituras.</p>

            <!-- Exibe mensagens de ERRO, se houver -->
            <?php if (isset($_GET['erro'])): ?>
                <?php if ($_GET['erro'] == 'senhas_diferentes'): ?>
                    <p style="color:red; text-align:center;">As senhas não coincidem!</p>
                <?php elseif ($_GET['erro'] == 'email_existe'): ?>
                    <p style="color:red; text-align:center;">Este email já está cadastrado!</p>
                <?php else: ?>
                    <p style="color:red; text-align:center;">Erro ao cadastrar. Tente novamente.</p>
                <?php endif; ?>
            <?php endif; ?>

            <form action="cadastrar.php" method="POST">
                <label for="nome">Nome:</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Nome"
                    required>

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

                <label for="confirmar_senha">Confirmar Senha:</label>
                <input 
                    type="password"
                    id="confirmar_senha"
                    name="confirmar_senha"
                    placeholder="Confirmar Senha"
                    required>    

                <button type="submit">Criar conta</button>
            </form>
            <a href="login.php" class="voltar-login"> Já tem uma conta? Faça login </a>
        </div>
    </section>
</body>
</html>