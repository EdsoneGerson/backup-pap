<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['autenticado'])){
    session_destroy();
    header('Location: login.php');
    exit();
}

// Define as moedas mais fortes suportadas
$moedas = [
    "EUR",   // Euro
    "BRL",    // Real Brasileiro
    "USD",   // Dólar Americano
    "CHF",   // Franco Suíço
    "GBP",   // Libra Esterlina
    "AUD",   // Dólar Australiano
    "CAD",   // Dólar Canadense
    "SGD",   // Dólar de Cingapura
    "NZD",   // Dólar Neozelandês
    "SEK",   // Coroa Sueca
    "NOK",   // Coroa Norueguesa
    "DKK",   // Coroa Dinamarquesa
];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conversor de Moedas</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mensal.css">
    <link rel="stylesheet" href="css/conversor.css">

</head>

<body>
    <?php require_once('inc/menu.php'); ?>

    <main class="container-fluid">
        <section class="row">
            <div class="col-12 text-center mt-4">
                <h1><b>Conversor</b></h1>
            </div>
        </section>
        <div class="container">
            <section class="row">
                <div class="col-sm-12 col-lg-6 text-center mx-auto">
                    <!-- Formulário com seleção de moedas e entrada de valor -->
                    <form class="row g-3 justify-content-center mt-4">
                        <!-- Linha de moeda de origem e valor -->
                        <div class="col-6">
                            <label for="from_currency" class="form-label"><b>Moeda Origem:</b></label>
                            <select id="from_currency" class="btn btn-outline-dark mt-1" required>
                                <?php foreach ($moedas as $moeda): ?>
                                    <option value="<?= $moeda ?>"><?= $moeda ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="amount" class="form-label"><b>Valor:</b></label>
                            <input type="number" class="form-control" id="amount" step="0.01" min="0" placeholder="0" require>
                        </div>
                        <!-- Linha de moeda de destino e resultado -->
                        <div class="col-6">
                            <label for="to_currency" class="form-label"><b>Moeda Destino:</b></label>
                            <select class="btn btn-outline-dark mt-1" id="to_currency" required>
                                <?php foreach ($moedas as $moeda): ?>
                                    <option value="<?= $moeda ?>"><?= $moeda ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="converted" class="form-label"><b>Valor:</b></label>
                            <input type="text" class="form-control" id="converted" placeholder="0" readonly>
                        </div>
                    </form>
                    <?php
                    $classeBotao = (isset($_COOKIE['modo']) && $_COOKIE['modo'] === 'escuro') ? 'btn btn-outline-light' : 'btn btn-outline-dark';
                    ?>
                    <button id="botao" type="button" class="btn btn-outline-dark" onclick="trocarMoedas()">⇵</button>
                    <!-- Alertas de erro -->
                    <div id="erro" class="alert alert-danger mt-4 d-none" role="alert"></div>
                </div>
                <script src="js/conversor.js"></script>
            </section>
            <span
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                data-bs-html="true"
                title="
                    EUR - Euro<br>
                    BRL - Real Brasileiro<br>
                    USD - Dólar Americano<br>
                    CHF - Franco Suíço<br>
                    GBP - Libra Esterlina<br>
                    AUD - Dólar Australiano<br>
                    CAD - Dólar Canadense<br>
                    SGD - Dólar de Cingapura<br>
                    NZD - Dólar Neozelandês<br>
                    SEK - Coroa Sueca<br>
                    NOK - Coroa Norueguesa<br>
                    DKK - Coroa Dinamarquesa">
                <i class="bi bi-info-circle info-icon" style="cursor: pointer;"></i>
            </span>

        </div>
    </main>
    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

</html>