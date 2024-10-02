<?php
// Incluir o arquivo de conexão
include 'conexao.php'; // Certifique-se de que o caminho está correto

// Definir o cabeçalho como JSON
header('Content-Type: application/json');

// Obtenha o termo de busca da URL
$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '';

// Preparar e executar a consulta SQL
$sql = "SELECT nome_filme, ano_filme, topicos_destaque, image_path, nota_filme 
        FROM filmes 
        WHERE nome_filme LIKE ?";
$stmt = $conn->prepare($sql); // Usando $conn da conexão incluída
$stmt->bind_param("s", $search); // "s" para string
$stmt->execute();

// Buscar os resultados
$resultados = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Verificar se há resultados e enviar o JSON
if ($resultados) {
    echo json_encode($resultados);
} else {
    // Retornar um JSON vazio se nenhum filme for encontrado
    echo json_encode([]);
}

$stmt->close();
$conn->close(); // Fechar a conexão
