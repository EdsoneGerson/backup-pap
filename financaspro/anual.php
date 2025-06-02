<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['autenticado'])){
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anual</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mensal.css">
    <script src="js/anual.js"></script>
</head>

<body>

    <?php require_once('inc/menu.php'); ?>

    <main class="container-fluid">
        <section class="row">
            <div class="col-12 text-center mt-4">
                <h1><b>Simulador de Poupança</b></h1>
            </div>
        </section>

        <section class="row">
            <div class="col-sm-12 col-lg-10 text-center mx-auto">
                <div class="container">
                    <form id="savingsForm" onsubmit="event.preventDefault(); calculate();">
                        <label for="aporte">valor mensal (€):</label>
                        <input type="text" id="aporte" placeholder="0,00" inputmode="numeric" autocomplete="off" required>

                        <label for="meses">Número de meses:</label>
                        <input type="number" id="meses" step="0.01" min="0" placeholder="0" required>

                        <label for="taxa">Juros mensal (%):</label>
                        <input type="text" id="taxa" placeholder="0%" inputmode="decimal" autocomplete="off" required>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const aporteInput = document.getElementById("aporte");
                                const mesesInput = document.getElementById("meses");
                                const taxaInput = document.getElementById("taxa");
                                const resultDiv = document.getElementById('result');

                                // Formatar campo de aporte
                                aporteInput.addEventListener("input", function(e) {
                                    let valor = e.target.value.replace(/\D/g, '');

                                    if (valor === '') {
                                        e.target.value = '';
                                        return;
                                    }

                                    valor = (parseInt(valor, 10) / 100).toFixed(2);
                                    valor = valor.replace('.', ',');
                                    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                    e.target.value = valor;
                                });

                                // Bloquear colagem inválida no aporte
                                aporteInput.addEventListener("paste", function(e) {
                                    const pasted = e.clipboardData.getData('Text');
                                    if (!/^\d+$/.test(pasted.replace(/\D/g, ''))) {
                                        e.preventDefault();
                                    }
                                });

                                // Função para formatar o valor como moeda
                                function formatEuro(value) {
                                    return new Intl.NumberFormat('pt-PT', {
                                        style: 'currency',
                                        currency: 'EUR',
                                        minimumFractionDigits: 2
                                    }).format(value);
                                }
                            });
                        </script>

                        <div class="result mt-4" id="result"></div>
                    </form>

                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>