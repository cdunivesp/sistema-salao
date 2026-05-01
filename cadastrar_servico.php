<?php
include 'conexao.php';

$msg = "";

if (isset($_POST['botao_salvar'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $duracao = $_POST['duracao'];

    $sql = "INSERT INTO servicos (nome, preco, duracao) 
            VALUES ('$nome', '$preco', '$duracao')";

    if (mysqli_query($conn, $sql)) {
        $msg = "Serviço salvo com sucesso!";
    } else {
        $msg = "Erro: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Serviço</title>
    <link rel="stylesheet" href="estilo.css">

    <style>
        .forcar-alinhamento {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .forcar-alinhamento label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        .forcar-alinhamento input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .forcar-alinhamento input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 15px;
            font-size: 18px;
        }
    </style>
</head>

<body>

<h1>Salão de Beleza</h1>
<h2>Cadastrar Serviço</h2>

<a href="index.php" class="btn-voltar">Voltar</a>

<?php if ($msg != "") echo "<p style='text-align:center;'>$msg</p>"; ?>

<div class="forcar-alinhamento">
<form method="POST">

    <label>Nome do Serviço:</label>
    <input type="text" name="nome" required>

    <label>Preço:</label>
    <input type="text" name="preco" required>

    <label>Duração (minutos):</label>
    <input type="number" name="duracao" required>

    <input type="submit" name="botao_salvar" value="Salvar Serviço">

</form>
</div>

<hr>
<p class="rodape">Desenvolvido DRP08 - Projeto Integrador</p>

</body>
</html>
