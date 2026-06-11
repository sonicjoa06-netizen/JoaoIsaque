<?php
include "conexao.php";

if (isset($_GET['excluir'])) {
    $id = intval($_GET['excluir']);

    mysqli_query($conexao, "DELETE FROM usuarios WHERE id = $id");

    header("Location: listar.php");
    exit;
}

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
    <style>
   body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    margin: 0;
    padding: 40px;
    min-height: 100vh;
}

main {
    max-width: 900px;
    margin: 0 auto;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

h1 {
    text-align: center;
    color: #1e3c72;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    overflow: hidden;
}

th {
    background: #1e3c72;
    color: white;
    padding: 12px;
    text-align: left;
}

td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f4f7fc;
}

tr:hover {
    background-color: #e3ecff;
    transition: 0.3s;
}

a {
    display: inline-block;
    margin-top: 18px;
    margin-right: 10px;
    padding: 8px 14px;
    background: #1e88e5;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
}

a:hover {
    background: #1565c0;
}

.excluir {
    background: #dc3545;
    color: white;
    margin-top: 0;
}

.excluir:hover {
    background: #b02a37;
}
    </style>
</head>
<body>
    <main>
        <h1>Lista de Usuario</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>

            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $linha["id"]; ?></td>
                    <td><?php echo $linha["nome"]; ?></td>
                    <td><?php echo $linha["email"]; ?></td>
                    <td><?php echo $linha["senha"]; ?></td>
                    <td>
                        <a class="excluir"
                           href="listar.php?excluir=<?php echo $linha['id']; ?>"
                           onclick="return confirm('Deseja excluir este usuario?')">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>

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