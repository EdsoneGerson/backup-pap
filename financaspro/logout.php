<?php
    //terminar sessão
    session_start();

    session_destroy();
    //redireccionar para a página inicial
    header(header:"Location: login.php");
?>