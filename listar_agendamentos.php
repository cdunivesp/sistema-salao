<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="estilo.css">

    <style>
        .card {
            max-width: 1000px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        .titulo {
            text-align: center;
       
    </style>
</head>
<body>

<h1>Salão de Beleza</h1>
<h2 class="titulo">Lista de Agendamentos</h2>

<div class="card">
    <a href="index.php" class="btn-voltar"><< Voltar</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Serviço</th>
            <th>Profissional</th>
            <th>Data e Hora</th>
        </tr>

        <?php
        $sql = "
            SELECT 
                a.id,
                c.nome AS cliente,
                s.nome AS servico,
                p.nome AS profissional,
                a.data_hora
            FROM agendamentos a
            JOIN clientes c ON a.cliente_id = c.id
            JOIN servicos s ON a.servico_id = s.id
            JOIN profissionais p ON a.profissional_id = p.id
            ORDER BY a.data_hora DESC
        ";

        $resultado = mysqli_query($conn, $sql);

        if (!$resultado) {
            echo "<tr><td colspan='5'>Erro na consulta</td></tr>";
        } else {
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $linha['id'] . "</td>";
                echo "<td>" . $linha['cliente'] . "</td>";
                echo "<td>" . $linha['servico'] . "</td>";
                echo "<td>" . $linha['profissional'] . "</td>";
                echo "<td>" . $linha['data_hora'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>

<hr>
<p class="rodape">Desenvolvido DRP08 - Projeto Integrador</p>

</body>
</html>
