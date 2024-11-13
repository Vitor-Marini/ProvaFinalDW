<?php

include "conexao.php"; 
header('Content-Type: application/json');


$categorias = $conn->query("SELECT * FROM tb_categoria");
$resultado = [];

while ($categoria = $categorias->fetch_assoc()) {
    $idCategoria = $categoria['id'];
    $itens = $conn->query("SELECT * FROM tb_itens WHERE idCategoria = $idCategoria");
    $itensArray = [];

    while ($item = $itens->fetch_assoc()) {
        $itensArray[] = [
            'nome' => $item['nome'],
            'descricao' => $item['descricao'],
            'foto' => $item['foto'], // Deve ser a URL da imagem se estiver em um diretório
            'preco' => $item['preco'],
            'id' => $item['id']
        ];
    }

    $resultado[] = [
        'categoria' => $categoria['nome'],
        'itens' => $itensArray
    ];
}

echo json_encode($resultado);
$conn->close();
?>
