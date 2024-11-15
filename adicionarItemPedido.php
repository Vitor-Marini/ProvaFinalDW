<?php
include 'conexao.php'; 

$userID = $_POST['userID']; 
$itemID = $_POST['itemID']; 
$quantidade = $_POST['quantidade']; 
$preco = $_POST['preco']; 


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