<?php
include 'conexao.php';

var_dump($_POST);


// Exibir os dados recebidos para depuração
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se os campos estão definidos e não estão vazios
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = $_POST['senha']; // Não precisa sanitizar a senha, será hashada
        
        // Verificar se a sanitização do email falhou
        if (!$email) {
            echo "O formato do email é inválido!";
            exit;
        }

        // Verifica se o email já existe no banco de dados
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

        // Inserir os dados no banco
        $query = $conn->prepare("INSERT INTO tabela_usuario (Nome, Email, Senha) VALUES (?, ?, ?)");
        $query->bind_param('sss', $nome, $email, $senha_hash);

        if ($query->execute()) {
            echo "Cadastro realizado com sucesso!";
            header("Location: login.html");
            exit;
        } else {
            echo "Erro ao cadastrar usuário: " . $conn->error;
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
