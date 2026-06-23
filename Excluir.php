<?php
include "conexao.php";

if (!isset($_GET["codigo"])) {
    echo "<script>
            alert('Usuario nao encontrado!');
            location.href='index.php';
          </script>";
    exit;
}

$codigo = $_GET["codigo"];

try {
    $sql = "DELETE FROM tbUsuarios WHERE codi_cr = :codigo";
    $stmt = $conex->prepare($sql);
    $stmt->bindParam(":codigo", $codigo);
    $stmt->execute();

    echo "<script>
            alert('Usuario excluido com sucesso!');
            location.href='index.php';
          </script>";
} catch (PDO $erro) {
    echo "<script>
            alert('Erro ao excluir Usuario!');
            location.href='index.php';
          </script>";
}

echo "<br/><br/>";
echo "<a href='index.html'>Voltar pro menu</a>";
echo "</body>";
?>