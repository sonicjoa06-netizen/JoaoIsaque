<?php
include "conexao.php";

$nome = $_POST["nome"];
$busca = $nome . "%";

$sql = "SELECT * FROM tbUsuarios WHERE nome LIKE '$busca'";
$resultado = mysqli_query($conexao, $sql);

$total_registros = mysqli_num_rows($resultado);

echo "<body>";
echo "<h1>Resultado da Pesquisa</h1>";
echo "<hr/>";

echo "<p>Pesquisa realizada pelo nome: <b>$nome</b></p>";

if ($total_registros > 0) {

    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    echo "<tr>";
    echo "<th colspan='4'>Usuários Encontrados</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>E-mail</th>";
    echo "<th>Senha</th>";
    echo "</tr>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        $id = $linha["id"];
        $nome_usuario = $linha["nome"];
        $email = $linha["email"];
        $senha = $linha["senha"];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$nome_usuario</td>";
        echo "<td>$email</td>";
        echo "<td>$senha</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {

    echo "<p>Nenhum usuário encontrado.</p>";

}

echo "<br><br>";

echo "<a href='menu.html'>Menu</a> ";
echo "<a href='cadastrar.html'>Cadastrar</a> ";
echo "<a href='listar.php'>Listar</a> ";
echo "<a href='pesquisar.html'>Pesquisar</a>";

echo "</body>";

mysqli_close($conexao);
?>