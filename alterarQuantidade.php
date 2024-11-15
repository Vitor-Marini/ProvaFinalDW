<?php

include 'conexao.php'; 

$id = $_POST['idPedido'];
$quantidade = $_POST['quantidade'];
$userID = $_POST['userID']; 

$query = "SELECT quantidade FROM tb_itens_pedido WHERE id = ? AND idUsuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $id, $userID);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $novaQuantidade = $row['quantidade'] + $quantidade;
    
    if ($novaQuantidade > 0) {
        
        $updateQuery = "UPDATE tb_itens_pedido SET quantidade = ? WHERE id = ? AND idUsuario = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("iii", $novaQuantidade, $id, $userID);
        if ($updateStmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erro ao atualizar a quantidade']);
        }
    } else {
        //Verifico se a quantidade nova é <= 0 entao remove o pedido
        $deleteQuery = "DELETE FROM tb_itens_pedido WHERE id = ? AND idUsuario = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("ii", $id, $userID);
        if ($deleteStmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Item removido']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erro ao remover o item']);
        }
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Item não encontrado']);
}


$conn->close();
?>
