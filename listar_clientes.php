<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="estilo.css">

    <style>
        .forcar-alinhamento {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .forcar-alinhamento table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .forcar-alinhamento th,
        .forcar-alinhamento td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        .forcar-alinhamento th {
            background-color: #f2f2f2;
        }

        .forcar-alinhamento tr:nth-child(even) {
            background-color: #fafafa;
        }

        .titulo-tabela {
            text-align: center;
            margin-bottom: 20px;
        }

        .link-voltar {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #6a1b9a;
            font-weight: bold;
        }

        .link-voltar:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Salão de Beleza</h1>
<h2 class="titulo-tabela">Lista de Clientes Cadastrados</h2>

<div class="forcar-alinhamento">
    <a href="index.php" class="link-voltar"><< Voltar para a Tela Inicial</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
        </tr>

        <?php
        $sql = "SELECT * FROM clientes";
        $resultado = mysqli_query($conn, $sql);

        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['telefone'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<hr>
<p class="rodape">Desenvolvido DRP08 - Projeto Integrador</p>

</body>
</html>
