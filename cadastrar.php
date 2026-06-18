<?php
include "conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "INSERT INTO tbUsuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if (mysqli_query($conexao, $sql)) {
    echo "<script language=javascript>alert('Usuario cadastrado com sucesso!');location.href='cadastrar.html';</script>";
    } 
else {
    echo "<script language=javascript>alert('Erro ao cadastrar Usuario!.mysqli_error($conexao)');location.href='cadastrar.html';</script>";
}
    mysqli_close($conexao);
?>