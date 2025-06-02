<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['autenticado'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Utilizadores</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/ordenado.css">
    <link rel="stylesheet" href="css/modo.css">

</head>

<body>
    <?php require_once('inc/menu.php'); ?>

    <main class="container-fluid">
        <section class="row">
            <!-- não alterar nada acima desta linha -->
            <div class="col-12 text-center mt-4">
                <h1>Utilizadores</h1><br>
            </div>
        </section>
        <section class="row">
            <div class="col-sm-12 col-lg-10 text-center mx-auto">
                <!-- o conteúdo específico de cada página vem aqui -->
                <?php 
                    require_once('inc/bd.php');
                    $sql = "SELECT * FROM tbutilizadores ORDER BY id";
                    $resultado = mysqli_query($ligacaodb, $sql);
                    while($linha = mysqli_fetch_assoc($resultado)){
                        $id = $linha['id'];
                        $nome = $linha['nome'];
                        $email = $linha['email'];
                        $tipo = $linha['tipo'];
                        echo "
                        <article>
                            <p><b>Nome:</b> $nome
                            <b>Email:</b> $email
                            <b>Tipo:</b> $tipo 
                            <button onclick=\'remover('$nome', $id)\'>Remover</button>
                            <button onclick=\'editar($id)\'>Editar</button>
                            </p><br>
                        </article>
                        ";}
                ?>
            </div>
        </section>
        <!-- não alterar nada abaixo desta linha -->
    </main>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>