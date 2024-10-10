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

// Filtros
$grade = isset($_GET['grade']) ? $_GET['grade'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : 'all years';

// Filtro de classificação (aplicado apenas se existir)
if (!empty($grade)) {
    if ($grade === 'featured') {
        $query .= " AND classificacao = 'principal'";
    } elseif ($grade === 'popular') {
        $query .= " AND classificacao = 'popular'";
    } elseif ($grade === 'newest') {
        $query .= " AND classificacao = 'novo'";
    }
}

// Filtro de ano (aplicado sempre que um ano é selecionado)
if ($year !== 'all years') {
    if ($year == '2024') {
        $query .= " AND ano_filme = '2024'";
    } elseif ($year == '2020-2023') {
        $query .= " AND ano_filme BETWEEN 2020 AND 2023";
    } elseif ($year == '2010-2019') {
        $query .= " AND ano_filme BETWEEN 2010 AND 2019";
    } elseif ($year == '2000-2009') {
        $query .= " AND ano_filme BETWEEN 2000 AND 2009";
    } elseif ($year == '1980-1999') {
        $query .= " AND ano_filme BETWEEN 1980 AND 1999";
    }
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $filmes = array();

    while ($row = $result->fetch_assoc()) {
        $filmes[] = $row;
    }

    echo json_encode($filmes);
} else {
    echo json_encode([]);
}


$conn->close();

?>