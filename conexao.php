<?php
$servidor = "sql206.infinityfree.com";
$usuario = "if0_41713700";
$senha = "frp27031982";
$banco = "if0_41713700_salao";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    die("Erro na conexao: " . mysqli_connect_error());
}
?>
