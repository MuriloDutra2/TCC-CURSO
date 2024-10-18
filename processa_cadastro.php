<?php
include 'conexao.php';

var_dump($_POST);

// Adicionar isso no topo do processa_cadastro.php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    if (!$nome || !$email || !$senha) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    // Verifica se o email já existe
    $query = $conn->prepare("SELECT * FROM tabela_usuario WHERE Email = ?");
    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo "Este email já está registrado!";
        exit;
    }

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Tenta inserir os dados no banco
    $query = $conn->prepare("INSERT INTO tabela_usuario (Nome, Email, Senha) VALUES (?, ?, ?)");
    $query->bind_param('sss', $nome, $email, $senha_hash);

    if ($query->execute()) {
        echo "Cadastro realizado com sucesso!";
        header("Location: login.html");
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
}
?>
