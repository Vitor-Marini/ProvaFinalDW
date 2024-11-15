<?php
include 'conexao.php'; 

$userID = $_POST['userID']; 

$sql = "UPDATE tb_itens_pedido SET finalizado = TRUE WHERE idUsuario = ? AND finalizado = FALSE";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Pedido finalizado com sucesso']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao finalizar o pedido']);
}

$stmt->close();
$conn->close();
?>
