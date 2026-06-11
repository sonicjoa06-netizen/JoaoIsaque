<?php
include "conexao.php";

$nome = $_POST["nome"];
$busca = "$nome%";

$sql = "SELECT * FROM usuarios WHERE nome LIKE '$busca'";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Pesquisa</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    margin: 0;
    padding: 40px;
    min-height: 100vh;
}

main {
    max-width: 950px;
    margin: 0 auto;
    background: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

h1 {
    text-align: center;
    color: #1e3c72;
    margin-bottom: 20px;
}

p {
    color: #555;
    line-height: 1.6;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    overflow: hidden;
    border-radius: 10px;
}

th {
    background: #1e3c72;
    color: white;
    padding: 14px;
    text-align: left;
}

td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f7f9fc;
}

tr:hover {
    background-color: #e8f0ff;
    transition: 0.3s;
}

a {
    display: inline-block;
    margin-top: 20px;
    margin-right: 10px;
    padding: 10px 18px;
    background: #1e88e5;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
}

a:hover {
    background: #1565c0;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(21, 101, 192, 0.3);
}
    </style>
</head>
<body>
    <main>
        <h1>Resultado da pesquisa</h1>

        <p>Pesquisa feita com início do valor <?php echo "<strong>$nome</strong>, "; ?> como critério de busca por nome...
        <?php if (mysqli_num_rows($resultado) > 0) { ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                </tr>

                <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $linha["id"]; ?></td>
                        <td><?php echo $linha["nome"]; ?></td>
                        <td><?php echo $linha["email"]; ?></td>
                        <td><?php echo $linha["senha"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>Nenhum usuario encontrado.</p>
        <?php } ?>

        <p>
            <a href="menu.html">Menu</a>
            <a href="cadastrar.html">Cadastrar</a>
            <a href="listar.php">Listar</a>
            <a href="pesquisar.html">Pesquisar</a>
        </p>
    </main>
</body>
</html>
<?php
mysqli_close($conexao);
?>