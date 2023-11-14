<?php
// processa_date.php

// Inicie a sessão
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário da página date.html
    $nomeMembro1 = $_SESSION['nome_membro_1'];
    $nomeMembro2 = $_SESSION['nome_membro_2'];

    $entradaMembro1 = $_POST['entradaMembro1'];
    $pratoPrincipalMembro1 = $_POST['pratoPrincipalMembro1'];
    $sobremesaMembro1 = $_POST['sobremesaMembro1'];
    $bebidaMembro1 = $_POST['bebidaMembro1'];

    $entradaMembro2 = $_POST['entradaMembro2'];
    $pratoPrincipalMembro2 = $_POST['pratoPrincipalMembro2'];
    $sobremesaMembro2 = $_POST['sobremesaMembro2'];
    $bebidaMembro2 = $_POST['bebidaMembro2'];

    // Agora você tem os dados do formulário para ambos os membros
    // Faça o que for necessário com essas informações
    // ...

    // Exemplo: Redirecionar para outra página
    header("Location: outra_pagina.html");
    exit;
}
?>
