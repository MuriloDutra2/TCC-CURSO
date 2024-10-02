<?php
// Exibir erros para fins de depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir o arquivo de conexão
include 'conexao.php'; // Certifique-se de que o caminho está correto

// Definir o cabeçalho como JSON
header('Content-Type: application/json');

try {
    // Verifica se o parâmetro 'search' foi enviado via GET
    if (isset($_GET['search'])) {
        $search = '%' . strtolower($_GET['search']) . '%'; // Tornar o termo de busca minúsculo

        // Preparar a consulta SQL para buscar filmes pelo nome, ignorando maiúsculas/minúsculas
        $sql = "SELECT nome_filme, ano_filme, topicos_destaque, image_path, nota_filme 
                FROM tabela_filme
                WHERE LOWER(nome_filme) LIKE ?";
        $stmt = $conn->prepare($sql);

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            throw new Exception("Erro na preparação da consulta SQL: " . $conn->error);
        }

        // Vincular o parâmetro de busca e executar a consulta
        $stmt->bind_param("s", $search);

        if (!$stmt->execute()) {
            throw new Exception("Erro ao executar a consulta SQL: " . $stmt->error);
        }

        // Buscar os resultados
        $resultados = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        // Verificar se há resultados e enviar como JSON
        echo json_encode($resultados);

        // Fechar a consulta e a conexão
        $stmt->close();
        $conn->close();
    } else {
        // Caso o parâmetro 'search' não seja enviado, retorna um erro
        echo json_encode(['error' => "Parâmetro 'search' não enviado"]);
    }
} catch (Exception $e) {
    // Capturar e retornar qualquer exceção em formato JSON
    echo json_encode(['error' => $e->getMessage()]);
}
?>
