<?php
// Informações de conexão
$host = "localhost"; // Altere se necessário
$username = "root";  // Usuário do MySQL
$password = "";      // Senha do MySQL
$dbname = "c-street"; // Nome do banco de dados

// Conectar ao MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
