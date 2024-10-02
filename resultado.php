<?php

include "conexao.php";

// Definir o cabeçalho como JSON desde o início
header('Content-Type: application/json');

try {
    // Conexão com o banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=seu_banco_de_dados', 'seu_usuario', 'sua_senha');
} catch (PDOException $e) {
    // Retornar um erro como JSON
    echo json_encode(['error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
    exit;
}

// Obtenha o termo de busca da URL
$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '';

// Preparar e executar a consulta SQL
$sql = "SELECT nome_filme, ano_filme, topicos_destaque, image_path, nota_filme 
        FROM filmes 
        WHERE nome_filme LIKE :search";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':search', $search);

// Verificar se a execução da consulta ocorreu sem erros
if ($stmt->execute()) {
    // Buscar os resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar se há resultados e enviar o JSON
    if ($resultados) {
        echo json_encode($resultados);
    } else {
        // Retornar um JSON vazio se nenhum filme for encontrado
        echo json_encode([]);
    }
} else {
    // Caso ocorra um erro na execução da consulta, retorne um erro
    echo json_encode(['error' => 'Erro ao executar a consulta ao banco de dados']);
}

