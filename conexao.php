<?php
// Configurações de conexão com o banco de dados MySQL
$host = "localhost"; // O host do servidor MySQL (no XAMPP, é 'localhost')
$username = "root";  // Nome de usuário do MySQL (no XAMPP, geralmente é 'root')
$password = "";      // Senha do MySQL (no XAMPP, a senha padrão é vazia)
$dbname = "c-street"; // Nome do seu banco de dados

// Criar a conexão
$conn = new mysqli($host, $username, $password, $dbname);


?>