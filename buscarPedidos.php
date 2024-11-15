<?php
include 'conexao.php'; 
header('Content-Type: application/json');

$userID = $_GET['userID'];


$sql = "SELECT p.id, i.nome, p.quantidade, p.preco, i.foto 
        FROM tb_itens_pedido p
        JOIN tb_itens i ON p.idItem = i.id
        WHERE p.idUsuario = ? AND p.finalizado = FALSE";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);  
$stmt->execute();
$result = $stmt->get_result();

$pedidos = [];
while ($row = $result->fetch_assoc()) {
    if (empty($row['foto'])) {
        $row['foto'] = 'imgItens/defaultImg.png';  
    }
    
    $pedidos[] = $row;
}

echo json_encode($pedidos);  

$stmt->close();
$conn->close();
?>