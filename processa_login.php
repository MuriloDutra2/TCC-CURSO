<?php
// Iniciar sessão para armazenar dados do usuário após login
session_start();

// Conexão com o banco de dados
include 'conexao.php'; // Certifique-se de que conexao.php cria a variável $conn corretamente

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar dados do formulário de maneira segura
    $email = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL); // Alterado para coletar o email
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    // Verificar se a conexão foi estabelecida corretamente
    if ($conn) {
        // Preparar a consulta para evitar SQL injection
        $stmt = $conn->prepare("SELECT * FROM tabela_usuario WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Se encontrar o usuário, buscar os dados
            $user = $result->fetch_assoc();
            
            // Verificar se a senha inserida corresponde ao hash armazenado
            if (password_verify($senha, $user['Senha'])) {
                // Se o login for bem-sucedido, iniciar a sessão
                $_SESSION['usuario'] = $user['Nome']; // Armazenar o nome do usuário na sessão
                header("Location: index.php"); // Redirecionar para a página inicial
                exit();
            } else {
                // Se a senha estiver incorreta, exibir uma mensagem de erro
                $erro = "Email ou senha incorretos!";
                header("Location: login.php?erro=" . urlencode($erro)); // Redirecionar para a página de login com mensagem de erro
                exit();
            }
        } else {
            // Se o email não for encontrado, exibir uma mensagem de erro
            $erro = "Email ou senha incorretos!";
            header("Location: login.php?erro=" . urlencode($erro)); // Redirecionar para a página de login com mensagem de erro
            exit();
        }

        // Fechar a declaração e a conexão
        $stmt->close();
        $conn->close();
    } else {
        echo "Erro na conexão com o banco de dados!";
    }
} else {
    // Caso o acesso ao arquivo não seja via POST, redirecionar para o login
    header("Location: login.php");
    exit();
}
