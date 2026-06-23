<?php
echo "<link rel='stylesheet' type='text/css' href='pesquisar.css'/>";

include "conexao.php";

$nome = $_POST["nome"];
$busca = $nome . "%";

$sql = "SELECT * FROM tbUsuarios WHERE nome_cr LIKE :busca ORDER BY nome_cr ASC";
$stmt = $conex->prepare($sql);
$stmt->bindParam(":busca", $busca);
$stmt->execute();

$total_registros = $stmt->rowCount();

echo "<body>";
echo "<h1>Resultado da Pesquisa</h1>";
echo "<hr/>";

echo "<p>Pesquisa realizada pelo nome: <b>$nome</b></p>";

if ($total_registros > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    echo "<tr>";
    echo "<th colspan='6'>Usuarios Encontrados</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Codigo</th>";
    echo "<th>Nome</th>";
    echo "<th>E-mail</th>";
    echo "<th>Senha</th>";
    echo "<th>Sexo</th>";
    echo "<th>Nascimento</th>";
    echo "</tr>";

    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $codigo = $linha["codi_cr"];
        $nome_usuario = $linha["nome_cr"];
        $email = $linha["email_cr"];
        $senha = $linha["senha_cr"];
        $sexo = $linha["sexo_cr"];
        $dtna = $linha["dtna_cr"];

        echo "<tr>";
        echo "<td>$codigo</td>";
        echo "<td>$nome_usuario</td>";
        echo "<td>$email</td>";
        echo "<td>$senha</td>";
        echo "<td>$sexo</td>";
        echo "<td>$dtna</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum usuario encontrado.</p>";
}

echo "<br><br>";

echo "<a href='menu.html'>Menu</a> ";
echo "<a href='cadastrar.html'>Cadastrar</a> ";
echo "<a href='listar.php'>Listar</a> ";
echo "<a href='pesquisar.html'>Pesquisar</a>";

echo "</body>";
?>