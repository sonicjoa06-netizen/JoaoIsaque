<?php
include "conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$sexo = $_POST["sexo"];
$dtna = $_POST["dtna"];

$cada = $conex ->query("INSERT INTO tbUsuarios(nome_cr, email_cr, senha_cr, sexo_cr, dtna_cr) VALUES('$nome', '$email', '$senha', '$sexo', '$dtna')");
echo "<script>
        alert('Usuario cadastrado com sucesso!');
        location.href='cadastrar.html';
     </script>";
?>