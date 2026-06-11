<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "usuario";

$conexao = mysqli_connect($servidor, $usuario, $senha);

if (!$conexao) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8mb4");

mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS $banco");
mysqli_select_db($conexao, $banco);

$sqlTabela = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL
)";

mysqli_query($conexao, $sqlTabela);

$verificaSenha = mysqli_query($conexao, "SHOW COLUMNS FROM usuarios LIKE 'senha'");

if (mysqli_num_rows($verificaSenha) == 0) {
    mysqli_query($conexao, "ALTER TABLE usuarios ADD senha VARCHAR(100) NOT NULL");
}
?>