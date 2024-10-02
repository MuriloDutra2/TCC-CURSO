<?php

include "conexao.php";
// Conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=seu_banco_de_dados', 'seu_usuario', 'sua_senha');
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
}

// Obtenha o termo de busca da URL
$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '';

// Preparar e executar a consulta SQL
// Supondo que você já tenha colunas como ano_filme, topicos_destaque, image_path, etc.
$sql = "SELECT nome_filme, ano_filme, topicos_destaque, image_path, nota_filme 
        FROM filmes 
        WHERE nome_filme LIKE :search";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':search', $search);
$stmt->execute();

// Buscar os resultados
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar se há resultados
if ($resultados) {
    // Definir o cabeçalho como JSON
    header('Content-Type: application/json');
    
    // Enviar os resultados como JSON
    echo json_encode($resultados);
} else {
    // Se nenhum resultado for encontrado, retornar uma resposta vazia
    echo json_encode([]);
}
