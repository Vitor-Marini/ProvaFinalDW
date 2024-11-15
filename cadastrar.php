<?php
include "conexao.php"; 

$nome = $_POST["nome"];
$email = $_POST["email"];
$dataNascimento = $_POST["dataNascimento"];
$telefone = $_POST["telefone"];
$senha = $_POST["senha"]; 
$cep = $_POST["cep"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$complemento = $_POST["complemento"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];


$senhaHash = password_hash($senha, PASSWORD_BCRYPT);


 $sql = "SELECT id FROM tb_usuario WHERE email = ?";

 $stmt = $conn->prepare($sql);
 $stmt->bind_param("s", $email);
 $stmt->execute();
 $stmt->store_result();

 if ($stmt->num_rows > 0) {
     $errorMessage = urlencode("Email ja cadastrado");
     header("Location: cadastrar.html?error=$errorMessage");
 } else {
    $stmt->close();

    $sql = "INSERT INTO tb_usuario (nome, email, data_nascimento, telefone, senha, cep, rua, numero, bairro, complemento, cidade, estado) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $cmd = $conn->prepare($sql);

    $cmd->bind_param("ssssssssssss", $nome, $email, $dataNascimento, $telefone, $senhaHash, $cep, $rua, $numero, $bairro, $complemento, $cidade, $estado);

    if ($cmd->execute()) {
        $conn->close();
        header("Location: login.html");
        exit;  
    } else {
    echo "ERRO ao executar consulta: " . $cmd->error;
    }
    }






$conn->close();
?>
