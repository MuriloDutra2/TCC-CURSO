<?php

echo $query; // Exibe a consulta SQL

include 'conexao.php'; // Inclua seu arquivo de conexão com o banco

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Faz a busca no banco de dados
    $query = $conn->prepare("SELECT * FROM tabela_filme WHERE nome_filme LIKE ? OR topicos_destaque LIKE ?");
    $like_search = "%" . $search . "%";
    $query->bind_param("ss", $like_search, $like_search);
    $query->execute();
    $result = $query->get_result();

    $filmes = array();

    while ($row = $result->fetch_assoc()) {
        $filmes[] = array(
            'nome_filme' => $row['nome_filme'],
            'ano_filme' => $row['ano_filme'],
            'topicos_destaque' => $row['topicos_destaque'],
            'image_path' => $row['image_path'],
            'nota_filme' => $row['nota_filme']
        );
    }

    // Retorna os resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($filmes);
}


?>