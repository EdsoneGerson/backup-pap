<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['autenticado'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Importação do Chart.js -->
</head>

<body>
    <?php require_once('inc/menu.php'); ?>

    <main class="container-fluid">
        <section class="row">
            <!-- não alterar nada acima desta linha -->
            <div class="col-12 text-center mt-4">
                <h1>Gestor</h1>
            </div>
        </section>
        <section class="row">
            <div class="col-sm-12 col-lg-10 text-center mx-auto">
                <!-- o conteúdo específico de cada página vem aqui -->

                <!-- Exibição do saldo -->
                <div class="saldo-container" id="saldoContainer">
                    <h1><span id="saldo"></span></h1>
                    <!-- Botão para abrir o formulário -->
                    <div>
                        <button type="button" class="btn btn-outline-dark" id="botaoAbrir">Nova Transação</button>
                    </div>
                </div>




                <!-- Formulário -->
                <div id="formulario">
                    <h2></h2>
                    <form id="formEntrada">
                        <!-- Campos do formulário -->
                        <label for="nome">Nome da transação:</label><br>
                        <input type="text" id="nome" name="nome" required><br><br>

                        <!-- <label for="data">Data:</label><br>
                        <input type="date" id="data" name="data" required><br><br> -->

                        <label for="valor">Valor:</label><br>
                        <input type="number" id="valor" name="valor" step="0.01" required><br><br>

                        <label for="operacao">Operação:</label><br>
                        <select id="operacao" name="operacao" required>
                            <option value="aumentar">Aumentar Saldo</option>
                            <option value="diminuir">Diminuir Saldo</option>
                        </select><br><br>

                        <label for="categoria">Categoria:</label><br>
                        <select id="categoria" name="categoria" required>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Outro">Outro</option>
                        </select><br><br>

                        <!-- Botões -->
                        <button class="btn btn-outline-dark" type="submit">Concluir</button>
                        <button class="btn btn-outline-dark" type="button" id="botaoFechar">Fechar</button> <!-- Botão para fechar -->
                    </form>
                </div>

                <!-- Histórico de transações -->
                <div id="historico">
                    <h3>Histórico de Transações</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Hora</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <th>Tipo</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody id="tabelaHistorico"></tbody>
                    </table>
                </div>

                <!-- Gráfico -->
                <div id="graficoContainer">
                    <h3>Gráfico de Desempenho Financeiro</h3>
                    <canvas id="graficoSaldo"></canvas>
                </div>

                <script src="js/script.js"></script> <!-- Link para o JavaScript externo -->
            </div>
        </section>
        <!-- não alterar nada abaixo desta linha -->
    </main>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>