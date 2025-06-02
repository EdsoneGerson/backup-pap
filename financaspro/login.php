<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//verificar se o ficheiro foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    //incluir ligação a base de dados
    require_once('inc/Medoo.php');
    //verificar se existe alguma linha com nome, email e password
    $usuario = $basedados->get(
        "tbutilizadores",
        "*",
        [
            "email" => $email,
            "password" => $password
        ]
    );
    if ($usuario) {
        $_SESSION['autenticado'] = true;
        $_SESSION['nomeUtilizador'] = $usuario['nome'];
        $_SESSION['tipoUtilizador'] = $usuario['tipo'];
        //redireccionar para a página inicial
        header(header: "location: financa.php");
    } else {
        echo "<b><p>Dados de acesso inválidos!!</p></b>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FinançasPro</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php require_once('inc/menulog.php'); ?>
    <main class="container-fluid">
        <section class="row">
            <!-- não alterar nada acima desta linha -->
            <div class="col-12 text-center mt-4">
                <h1>Entrar na conta</h1>
            </div>
        </section>
        <section class="row">
            <div class="col-12 text-center">
            </div>
        </section>
        <section class="row">
            <div class="col-sm-12 col-lg-5 mx-auto">
                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <?php
                    $classeBotao = (isset($_COOKIE['modo']) && $_COOKIE['modo'] === 'escuro') ? 'btn btn-outline-light' : 'btn btn-outline-dark';
                    ?>
                    <button id="botao" type="submit" class="<?= $classeBotao ?>">Logar</button>
                </form>
            </div>
            <script src="js/login.js"></script>
        </section>
        <!-- não alterar nada abaixo desta linha -->
    </main>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>