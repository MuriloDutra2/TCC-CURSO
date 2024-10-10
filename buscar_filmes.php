<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "c-street";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inicializa a consulta SQL
$query = "SELECT * FROM tabela_filme WHERE 1=1";

// Filtro de classificação (Principais, Popular, Novos)
$grade = isset($_GET['grade']) ? $_GET['grade'] : 'principal';

// Aplicar o filtro de classificação
if ($grade === 'featured') {
    $query .= " AND classificacao = 'principal'";
} elseif ($grade === 'popular') {
    $query .= " AND classificacao = 'popular'";
} elseif ($grade === 'newest') {
    $query .= " AND classificacao = 'novo'";
}

// Executa a query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $filmes = array();

    while ($row = $result->fetch_assoc()) {
        $filmes[] = $row;
    }

    echo json_encode($filmes);
} else {
    echo json_encode([]); // Nenhum filme encontrado
}

$conn->close();
