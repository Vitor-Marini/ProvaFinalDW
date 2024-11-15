<?php
include 'conexao.php'; 
header('Content-Type: application/json');

// Obtém o ID do item a ser excluído
$itemID = $_POST['itemID']; // Receber o itemID via POST
$userID = $_POST['userID']; // Receber o userID via POST

// Deletar o item do pedido
$sql = "DELETE FROM tb_itens_pedido WHERE id = ? AND idUsuario = ? AND finalizado = FALSE";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $itemID, $userID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Item removido com sucesso']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao remover o item']);
}

$stmt->close();
$conn->close();
?>
