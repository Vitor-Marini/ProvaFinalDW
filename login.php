<?php
include "conexao.php"; 



$email = $_POST["email"];
$senha = $_POST["senha"];


$sql = "SELECT id, nome, senha FROM tb_usuario WHERE email = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo "Erro ao preparar a consulta: " . $conn->error;
    exit;
}


$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result(); 

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $nome, $senhaHash);
    $stmt->fetch();

    if (password_verify($senha, $senhaHash)) {
            
        session_start();
        $_SESSION["user_id"] = $id;
        $_SESSION["nome"] = $nome;

        //setcookie('username', $nome, time() + 3600, '/');
        setcookie('userInfo', json_encode(['nome' => $nome, 'id' => $id]), time() + 3600, '/');

        header("Location: cardapio.html");
        exit;
    }else{
        $errorMessage = urlencode("Email ou senha Invalidos!");
        header("Location: login.html?error=$errorMessage");
    }
    }else{
        $errorMessage = urlencode("Nenhum usuario encontrado com este email!");
        header("Location: login.html?error=$errorMessage");
    }

    

$stmt->close();
$conn->close();
?>
