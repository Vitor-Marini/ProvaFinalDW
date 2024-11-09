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


$sql = "INSERT INTO tb_usuario (nome, email, data_nascimento, telefone, senha, cep, rua, numero, bairro, complemento, cidade, estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



$cmd = $conn->prepare($sql);

if (!$cmd) {
    echo "ERRO ao preparar SQL: " . $conn->error;
    exit;
}


$cmd->bind_param("ssssssssssss", $nome, $email, $dataNascimento, $telefone, $senhaHash, $cep, $rua, $numero, $bairro, $complemento, $cidade, $estado);

if ($cmd->execute()) {
        $conn->close();
        header("Location: login.html");
        exit;  
} else {
    echo "ERRO ao executar consulta: " . $cmd->error;
}

$conn->close();
?>
