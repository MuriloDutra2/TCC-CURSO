<?php
// Incluir o arquivo de conexão
include 'conexao.php';

// Definir o cabeçalho como JSON
header('Content-Type: application/json');

try {
    // Verifica se o parâmetro 'search' foi enviado
    if (isset($_GET['search'])) {
        $search = '%' . strtolower($_GET['search']) . '%'; // Tornar o termo de busca minúsculo

        // Consulta SQL para buscar filmes e incluir url_filme
        $sql = "SELECT nome_filme, ano_filme, topicos_destaque, image_path, nota_filme, url_filme 
                FROM tabela_filme
                WHERE LOWER(nome_filme) LIKE ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Erro na preparação da consulta SQL: " . $conn->error);
        }

        $stmt->bind_param("s", $search);

        if (!$stmt->execute()) {
            throw new Exception("Erro ao executar a consulta SQL: " . $stmt->error);
        }

        $resultados = [];
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $resultados[] = [
                'nome_filme' => $row['nome_filme'],
                'ano_filme' => $row['ano_filme'],
                'topicos_destaque' => $row['topicos_destaque'],
                'image_path' => $row['image_path'],
                'nota_filme' => $row['nota_filme'],
                'url_filme' => $row['url_filme']
            ];
        }

        echo json_encode($resultados);
        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(['error' => "Parâmetro 'search' não enviado"]);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
