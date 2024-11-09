<?php

//Parametros de cone
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "aguaDB";

//Estabelecer conexao
$conn = new mysqli($servidor,$usuario,$senha,$banco);

if($conn->connect_error){
    die("Falha na conexao: " . $conn->connect_error);

}
echo "Conexao realizada com sucesso!"
?>
