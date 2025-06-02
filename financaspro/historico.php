<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

    // Verifica se o utilizador está autenticado
    if (isset($_SESSION["utilizador"])) {
        header("Location: login.php");
        exit();
    }

    $ficheiro_log = "historico.log";
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
</head>

<body>
    <?php require_once('inc/menu.php'); ?>

    <main class="container-fluid">
        <section class="row">
            <!-- não alterar nada acima desta linha -->
            <div class="col-12 text-center mt-4">
                <h1><b>Histórico</b></h1>
            </div>
        </section>
        <section class="row">
            <div class="col-sm-12 col-lg-10 text-center mx-auto">
                <!-- o conteúdo específico de cada página vem aqui -->
                <?php if (file_exists($ficheiro_log)) {
                    $linhas = file($ficheiro_log);
                    echo "<ul>";
                    foreach ($linhas as $linha) {
                        echo "<li>" . htmlspecialchars($linha) . "</li>";
                    }
                } else {
                    echo "Não existe nenhum registo de acesso.";
                } ?>
            </div>
        </section>
        <!-- não alterar nada abaixo desta linha -->
    </main>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>