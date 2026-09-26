<?php
$servidor = "localhost";
$utilizador = "root";
$senha = "";
$banco = "museu_digital";

// Criar a ligação
$conn = new mysqli($servidor, $utilizador, $senha, $banco);

// Verificar a ligação
if ($conn->connect_error) {
    die("Falha na ligação: " . $conn->connect_error);
}
?>