<?php
include "conexao.php";

//verifico quais parametros estou recebendo
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$senha = isset($_POST["senha"]) ? $_POST["senha"] : null;

if ($email && !$senha) {
    
    //Se recebeu apenas o email 
    $sql = "SELECT id FROM tb_usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $successMessage = urlencode("Redefiniçao de senha");
        header("Location: recuperarsenha.html?success=$successMessage&email=" . urlencode($email));
    } else {
        $errorMessage = urlencode("Nenhum usuario encontrado com este email!");
        header("Location: recuperarsenha.html?error=$errorMessage");
    }
} elseif ($email && $senha) {
    
    //Se recebeu tanto email quanto senha
    $sql = "UPDATE tb_usuario SET senha = ? WHERE email = ?";
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $senhaHash, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $successMessage = urlencode("Senha redefinida com sucesso!");
        header("Location: login.html?success=$successMessage");
    } else {
        $errorMessage = urlencode("Erro ao redefinir a senha.");
        header("Location: recuperarsenha.html?error=$errorMessage");
    }
} else {
    
    $errorMessage = urlencode("Parâmetros inválidos.");
    header("Location: recuperarsenha.html?error=$errorMessage");
}

$stmt->close();
$conn->close();
?>