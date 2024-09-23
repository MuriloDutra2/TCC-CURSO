<?php
// Conectar ao banco de dados MySQL
$host = "localhost";
$username = "root";  // Altere conforme necessário
$password = "";      // Adicione sua senha
$dbname = "c-street"; // Nome do seu banco de dados

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
