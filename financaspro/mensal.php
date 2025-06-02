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
    <title>Mensal</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mensal.css">
    <script src="js/mensal.js"></script>
</head>

<body>
    <?php require_once('inc/menu.php'); ?>

    <main class="container-fluid">
        <section class="row">
            <!-- não alterar nada acima desta linha -->
            <div class="col-12 text-center mt-4">
                <h1><b>Poupança Mensal</b></h1>
            </div>
        </section>
        <section class="row">
            <div class="col-sm-12 col-lg-10 text-center mx-auto">
                <div class="container">
                    <form id="savingsForm" class="calc_form">

                        <label for="montante">Montante desejado (€):</label>
                        <input type="text" id="montante" name="montante" required placeholder="0,00" inputmode="numeric" autocomplete="off">

                        <script>
                            const input = document.getElementById('montante');

                            input.addEventListener('input', function(e) {
                                // Remove tudo que não seja dígito
                                let valor = e.target.value.replace(/\D/g, '');

                                // Se estiver vazio, limpa o campo
                                if (valor === '') {
                                    e.target.value = '';
                                    return;
                                }

                                // Converte para número com 2 casas decimais
                                valor = (parseInt(valor, 10) / 100).toFixed(2);

                                // Troca ponto decimal por vírgula
                                valor = valor.replace('.', ',');

                                // Adiciona separadores de milhar com ponto
                                valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                e.target.value = valor;
                            });

                            // Bloqueia colagem de conteúdo inválido
                            input.addEventListener('paste', function(e) {
                                const pasted = e.clipboardData.getData('Text');
                                if (!/^\d+$/.test(pasted.replace(/\D/g, ''))) {
                                    e.preventDefault();
                                }
                            });
                        </script>

                        <label for="anos">Número de meses:</label>
                        <input type="number" id="meses" name="meses" required step="1" min="1" placeholder="0">
                        <div class="result" id="poupanca"></div>
                    </form>

                </div>
            </div>
        </section>
        <!-- não alterar nada abaixo desta linha -->
    </main>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>