<?php 
function registar_acao($acao) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $utilizador = isset($_SESSION['utilizador']) ? $_SESSION['utilizador'] : 'Desconhecido';
    $data = date("Y-m-d H:i:s");
    $linha = "[$data] $utilizador: $acao\n";
    file_put_contents("historico.log", $linha, FILE_APPEND);
}
?>