<?php
// Exibir erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir o arquivo de conexão
include 'conexao.php'; // Certifique-se de que o caminho está correto

// Definir o cabeçalho como JSON
header('Content-Type: application/json');

try {
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

        // Buscar os resultados
        $resultados = [];
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $resultados[] = [
                'nome_filme' => $row['nome_filme'],
                'ano_filme' => $row['ano_filme'],
                'topicos_destaque' => $row['topicos_destaque'],
                'image_path' => $row['image_path'],
                'nota_filme' => $row['nota_filme'],
                'url_filme' => $row['url_filme'] // Certifique-se de que 'url_filme' está corretamente sendo retornado
            ];
        }

        echo json_encode($resultados); // Retorna os resultados como JSON
        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(['error' => "Parâmetro 'search' não enviado"]);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
