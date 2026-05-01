<?php
include 'conexao.php';

$msg = "";

if(isset($_POST['botao_salvar'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $preferencias = $_POST['preferencias'];

    $sql = "INSERT INTO clientes (nome, telefone, preferencias) VALUES ('$nome', '$telefone', '$preferencias')";

    if (mysqli_query($conn, $sql)) {
        $msg = "Cliente salvo com sucesso!";
    } else {
        $msg = "Erro ao salvar: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        /* css somente desta parte, nao esquecer */
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
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
            text-align: left;
        }
        .forcar-alinhamento input[type="text"],
        .forcar-alinhamento textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box; 
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .forcar-alinhamento textarea {
            height: 120px;
            resize: vertical;
        }
        .forcar-alinhamento input[type="submit"] {
            width: 100%;
            margin-top: 25px;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Salão de Beleza</h1>
    <h2>Cadastrar Cliente</h2>

    <!-- voltar -->
    <a href="index.php" class="btn-voltar">Voltar para a Tela Inicial</a>

    <?php if ($msg != "") { echo "<p class='msg-sucesso' style='text-align:center;'>$msg</p>"; } ?>

    <!-- caixa -->
    <div class="forcar-alinhamento">
        <form method="POST">
            
            <label>Nome Completo:</label>
            <input type="text" name="nome" required>

            <label>Telefone / WhatsApp:</label>
            <input type="text" name="telefone" required>

            <label>Preferências do Cliente:</label>
            <textarea name="preferencias" placeholder="Ex: Gosta de secar o cabelo com difusor..."></textarea>

            <input type="submit" name="botao_salvar" value="Salvar Cliente">

        </form>
    </div>

    <hr>
    <p class="rodape">Desenvolvido DRP08 - Projeto Integrador</p>

</body>
</html>
