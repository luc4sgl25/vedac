<?php
$servidor = "localhost";
$usuario = "root";
$senha = ""; // Deixe vazio se estiver usando XAMPP padrão
$banco = "venda_carros";

// Criar a conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>