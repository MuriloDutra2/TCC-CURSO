<?php
// Iniciar sessão caso queira exibir mensagens de confirmação
session_start();

// Conexão com o banco de dados
include 'conexao.php';  // Certifique-se de que este arquivo conecta ao banco e define $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter e sanitizar os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');

    // Inserir a mensagem no banco de dados
    $sql = "INSERT INTO contato_mensagens (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    if ($stmt->execute()) {
        $_SESSION['mensagem_sucesso'] = "Mensagem enviada com sucesso!";
    } else {
        $_SESSION['mensagem_erro'] = "Erro ao enviar mensagem.";
    }

    $stmt->close();
    $conn->close();

    // Redirecionar para a página de contato com mensagem de sucesso ou erro
    header("Location: contato.php");
    exit();
}
?>
