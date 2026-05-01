<?php
include 'conexao.php';

$msg = "";

if (isset($_POST['agendar'])) {
    $cliente_id      = $_POST['cliente_id'];
    $servico_id      = $_POST['servico_id'];
    $profissional_id = $_POST['profissional_id'];
    $data_hora       = $_POST['data_hora'];

    $sql = "INSERT INTO agendamentos (cliente_id, servico_id, profissional_id, data_hora)
            VALUES ('$cliente_id', '$servico_id', '$profissional_id', '$data_hora')";

    if (mysqli_query($conn, $sql)) {
        $msg = "Agendamento realizado com sucesso!";
    } else {
        $msg = "Erro ao agendar: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Agendamento</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h1>Salão de Beleza</h1>
    <h2>Realizar Novo Agendamento</h2>

    <a href="index.php" class="btn-voltar">Voltar para a Tela Inicial</a>

    <?php if ($msg != "") { echo "<p class='msg-sucesso'>$msg</p>"; } ?>

   	<div class="container-form">
   	<form method="POST" action="">


        <label>Quem é o Cliente?</label>
        <select name="cliente_id" required>
            <option value="">-- Selecione o Cliente --</option>
            <?php
            $res = mysqli_query($conn, "SELECT id, nome FROM clientes ORDER BY nome ASC");
            if ($res) {
                while ($c = mysqli_fetch_assoc($res)) {
                    echo "<option value='" . $c['id'] . "'>" . $c['nome'] . "</option>";
                }
            }
            ?>
        </select>

        <label>Qual serviço ele vai fazer?</label>
        <select name="servico_id" required>
            <option value="">-- Selecione o Serviço --</option>
            <?php
            $res2 = mysqli_query($conn, "SELECT id, nome, preco FROM servicos");
            if ($res2) {
                while ($s = mysqli_fetch_assoc($res2)) {
                    echo "<option value='" . $s['id'] . "'>" . $s['nome'] . " (R$ " . $s['preco'] . ")</option>";
                }
            }
            ?>
        </select>

        <label>Com qual profissional?</label>
        <select name="profissional_id" required>
            <option value="">-- Selecione o Profissional --</option>
            <?php
            $res3 = mysqli_query($conn, "SELECT id, nome FROM profissionais");
            if ($res3) {
                while ($p = mysqli_fetch_assoc($res3)) {
                    echo "<option value='" . $p['id'] . "'>" . $p['nome'] . "</option>";
                }
            }
            ?>
        </select>

        <label>Data e Horário (Agenda):</label>
        <input type="datetime-local" name="data_hora" required>

        <input type="submit" name="agendar" value="Confirmar no Sistema">

    </form>
</div>


    <hr>
    <p class="rodape">Desenvolvido DRP08 - Projeto Integrador</p>

</body>
</html>
