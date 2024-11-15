<?php
include 'conexao.php'; 



$itemID = $_POST['itemID'];
$userID = $_POST['userID'];


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
