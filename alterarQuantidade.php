<?php
// Conexão com o banco de dados
include 'conexao.php'; // Substitua pelo nome do arquivo de conexão se necessário

// Verificar se os dados foram enviados corretamente


    $id = $_POST['idPedido'];
    $quantidade = $_POST['quantidade'];
    $userID = $_POST['userID']; 

    // Consultar a quantidade atual do item
    $query = "SELECT quantidade FROM tb_itens_pedido WHERE id = ? AND idUsuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id, $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $novaQuantidade = $row['quantidade'] + $quantidade;

        // Verificar se a nova quantidade é válida
        if ($novaQuantidade > 0) {
            // Atualizar a quantidade no banco de dados
            $updateQuery = "UPDATE tb_itens_pedido SET quantidade = ? WHERE id = ? AND idUsuario = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("iii", $novaQuantidade, $id, $userID);

            if ($updateStmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Erro ao atualizar a quantidade']);
            }
        } else {
            // Se a nova quantidade for 0 ou menor, remova o item
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


// Fechar a conexão
$conn->close();
?>
