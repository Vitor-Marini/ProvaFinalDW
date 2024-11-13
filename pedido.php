<?php
include 'conexao.php'; 
header('Content-Type: application/json');

// Recebe os dados em formato JSON
$data = json_decode(file_get_contents('php://input')); 

// Obtém os valores do JSON
$userID = $data[0]->userID;
$itemID = $data[0]->itemID;
$quantidade = $data[0]->quantidade;
$preco = $data[0]->preco;

//echo "userID: $userID, itemID: $itemID, quantidade: $quantidade, preco: $preco";


$sql = "INSERT INTO tb_itens_pedido (idUsuario, idItem, quantidade, preco) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiid", $userID, $itemID, $quantidade, $preco);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Item adicionado ao pedido com sucesso!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao inserir no banco de dados']);
}


$stmt->close();
$conn->close();
?>
