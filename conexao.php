<?php
$servidor = "localhost";
$usuario = "root";
$senha = "12345678";
$banco = "dbUsuarios";
$conex = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
?>