<?php
session_start();

// Elimina a sessão do usuário
session_destroy();

// Redireciona para a página de login
header("Location: login.php");
        exit();
?>