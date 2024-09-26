<?php
// Configurações do banco de dados
$host = "localhost";  // Host do MySQL
$username = "root";    // Nome de usuário do MySQL
$password = "";        // Senha do MySQL (preencha se for o caso)
$dbname = "c-street";  // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
} else {
    echo "Conexão com o banco de dados estabelecida com sucesso!";
}
?>

