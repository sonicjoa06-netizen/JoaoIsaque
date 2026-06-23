<?php
$servidor = "localhost";
$usuario = "root";
$senha = "12345678";
$banco = "dbUsuario";
$conex = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
?>