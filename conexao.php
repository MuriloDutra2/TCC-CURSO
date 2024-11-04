<?php
// Configurações de conexão com o banco de dados MySQL
$host = "sql207.infinityfree.com";
$username = "if0_37636597";
$password = "696cIdXteVIX1l";
$dbname = "if0_37636597_cstreet";

// Criar a conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar se a conexão deu certo
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>
