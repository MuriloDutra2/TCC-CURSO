<?php
// Conexão com o banco de dados
include 'conexao.php';

// Coletar dados do formulário
$login = $_POST['login'];
$senha = $_POST['senha'];

// Consultar no banco de dados
$query = $db->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
$query->bindParam(':login', $login);
$query->bindParam(':senha', $senha);
$query->execute();

$user = $query->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Se o login for bem-sucedido, iniciar a sessão
    session_start();
    $_SESSION['usuario'] = $user['nome_usuario']; // Armazenar o nome do usuário na sessão
    header("Location: index.php"); // Redirecionar para a página inicial
    exit();
} else {
    // Se as credenciais estiverem incorretas, exibir uma mensagem de erro
    $erro = "Usuário ou senha incorretos!";
    header("Location: login.php?erro=" . urlencode($erro)); // Redirecionar para a página de login com mensagem de erro
    exit();
}
