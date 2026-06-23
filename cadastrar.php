<?php
include "conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$sexo = $_POST["sexo"];
$dtna = $_POST["dtna"];

try {
    $sql = "INSERT INTO tbUsuarios (nome_cr, email_cr, senha_cr, sexo_cr, dtna_cr) 
            VALUES (:nome, :email, :senha, :sexo, :dtna)";

    $stmt = $conex->prepare($sql);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);
    $stmt->bindParam(":sexo", $sexo);
    $stmt->bindParam(":dtna", $dtna);

    $stmt->execute();

    echo "<script>
            alert('Usuario cadastrado com sucesso!');
            location.href='cadastrar.html';
          </script>";
} catch (PDOException $erro) {
    echo "<script>
            alert('Erro ao cadastrar Usuario!');
            location.href='cadastrar.html';
          </script>";
}
?>