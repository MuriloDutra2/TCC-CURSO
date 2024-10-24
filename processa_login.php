<?php
// Iniciar sessão para armazenar dados do usuário após login
session_start();

// Conexão com o banco de dados
include 'conexao.php'; // Certifique-se de que conexao.php cria a variável $conn corretamente

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar dados do formulário de maneira segura
    $email = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL); // Alterado para coletar o email
    $senha = $_POST['senha']; // Não sanitizar a senha com FILTER_SANITIZE_SPECIAL_CHARS, password_verify cuida disso

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
                // Se o login for bem-sucedido, iniciar a sessão com mais dados do usuário
                $_SESSION['usuario'] = $user['Nome']; // Nome do usuário
                $_SESSION['email'] = $user['Email']; // Email do usuário

                // Redirecionar para a página inicial ou outra página
                header("Location: index.php");
                exit();
            } else {
                // Se a senha estiver incorreta
                $erro = "Email ou senha incorretos!";
                header("Location: login.php?erro=" . urlencode($erro));
                exit();
            }
        } else {
            // Se o email não for encontrado
            $erro = "Email ou senha incorretos!";
            header("Location: login.php?erro=" . urlencode($erro));
            exit();
        }

        // Fechar a declaração e a conexão
        $stmt->close();
        $conn->close();
    } else {
        // Caso haja falha de conexão
        echo "Erro na conexão com o banco de dados!";
    }
} else {
    // Caso o acesso ao arquivo não seja via POST
    header("Location: login.php");
    exit();
}
?>
