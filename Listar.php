<?php
echo "<link rel='stylesheet' type='text/css' href='listar.css'/>";

include "conexao.php";

$Listar = $conex->query("SELECT * FROM tbUsuarios ORDER BY codi_cr DESC");
$total_registros = $Listar->rowCount();

echo "<body>";
echo "<h1>Listar Registros</h1>";
echo "<hr/>";

if ($total_registros > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='8'>Dados Cadastrados</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Codigo</th>";
    echo "<th>Nome</th>";
    echo "<th>E-mail</th>";
    echo "<th>Senha</th>";
    echo "<th>Sexo</th>";
    echo "<th>Nascimento</th>";
    echo "<th>Acao</th>";
    echo "<th>Acao</th>";
    echo "</tr>";

    while ($linha = $Listar->fetch(PDO::FETCH_ASSOC)) {
        $vcodi = $linha["codi_cr"];
        $vnome = $linha["nome_cr"];
        $vemail = $linha["email_cr"];
        $vsenha = $linha["senha_cr"];
        $vsexo = $linha["sexo_cr"];
        $vdtna = $linha["dtna_cr"];

        echo "<tr>";
        echo "<td>$vcodi</td>";
        echo "<td>$vnome</td>";
        echo "<td>$vemail</td>";
        echo "<td>$vsenha</td>";
        echo "<td>$vsexo</td>";
        echo "<td>$vdtna</td>";
        echo "<td>
                <a href='excluir.php?codigo=$vcodi' onclick=\"return confirm('Deseja realmente excluir este usuario?')\">
                    Excluir
                </a>
                </td>
                <td>
                <a href='alterar.php?codigo=$vcodi'>
                    Consultar
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum usuario cadastrado.</p>";
}

echo "<br/><br/>";
echo "<a href='index.html'>Voltar pro menu</a>";
echo "</body>";

?>