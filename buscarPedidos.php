<?php
include 'conexao.php'; 
header('Content-Type: application/json');

// Obtém o ID do usuário via cookie
$userID = $_GET['userID']; // Receber o userID via GET

// Consulta para buscar os itens de pedidos não finalizados
$sql = "SELECT p.id, i.nome, p.quantidade, p.preco 
        FROM tb_itens_pedido p
        JOIN tb_itens i ON p.idItem = i.id
        WHERE p.idUsuario = ? AND p.finalizado = FALSE";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);  // Previne SQL Injection
$stmt->execute();
$result = $stmt->get_result();

$pedidos = [];
while ($row = $result->fetch_assoc()) {
    $pedidos[] = $row;
}

echo json_encode($pedidos); // Retorna os dados em formato JSON

$stmt->close();
$conn->close();
?>
