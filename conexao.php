<?php


$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "aguaDB";


$conn = new mysqli($servidor,$usuario,$senha,$banco);

if($conn->connect_error){
    die("Falha na conexao: " . $conn->connect_error);
}

//Nao colocar echo aqui, pois influencia em requisiçoes
?>
