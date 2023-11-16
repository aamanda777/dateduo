<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
//sorteio.php
// Configurações do banco de dados
$host = "localhost";
$usuario_bd = "root";
$senha_bd = "";
$nome_bd = "dateduo";

// Conectar ao banco de dados usando mysqli
$conn = new mysqli($host, $usuario_bd, $senha_bd, $nome_bd);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão ao banco de dados: " . $conn->connect_error);
}

// Recuperar os dados do último sorteio
$resultados = $conn->query("SELECT * FROM escolhas_casal ORDER BY criado_em DESC LIMIT 1");

if ($resultados->num_rows > 0) {
    $row = $resultados->fetch_assoc();

    $entradaSorteio = sortear($row['entrada_membro_1'], $row['entrada_membro_2']);
    $pratoPrincipalSorteio = sortear($row['prato_principal_membro_1'], $row['prato_principal_membro_2']);
    $sobremesaSorteio = sortear($row['sobremesa_membro_1'], $row['sobremesa_membro_2']);
    $bebidaSorteio = sortear($row['bebida_membro_1'], $row['bebida_membro_2']);
} else {
    // Trate caso não haja dados de sorteio ainda
    $entradaSorteio = "N/A";
    $pratoPrincipalSorteio = "N/A";
    $sobremesaSorteio = "N/A";
    $bebidaSorteio = "N/A";
}

function sortear($opcao1, $opcao2)
{
    $sorteio = rand(0, 1);
    return $sorteio == 0 ? $opcao1 : $opcao2;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Sorteio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">DateDuo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Resultado do Sorteio</h2>

        <div class="row">
            <!-- Entrada -->
            <div class="col-md-6 mb-4">
                <h3 class="text-center mb-3">Entrada:</h3>
                <p class="lead text-center">
                    <?php echo $entradaSorteio; ?>
                </p>
            </div>

            <!-- Prato Principal -->
            <div class="col-md-6 mb-4">
                <h3 class="text-center mb-3">Prato Principal:</h3>
                <p class="lead text-center">
                    <?php echo $pratoPrincipalSorteio; ?>
                </p>
            </div>

            <!-- Sobremesa -->
            <div class="col-md-6 mb-4">
                <h3 class="text-center mb-3">Sobremesa:</h3>
                <p class="lead text-center">
                    <?php echo $sobremesaSorteio; ?>
                </p>
            </div>

            <!-- Bebida -->
            <div class="col-md-6 mb-4">
                <h3 class="text-center mb-3">Bebida:</h3>
                <p class="lead text-center">
                    <?php echo $bebidaSorteio; ?>
                </p>
            </div>
        </div>

    </div>
    <div class="text-center mt-4">
        <a href="#" id="compartilharWhatsapp" class="btn btn-success">
            Compartilhar via WhatsApp
        </a>
    </div>

    <script>
    $(document).ready(function () {
        $('#compartilharWhatsapp').click(function () {
            // Abre a página gerar_pdf.php em uma nova janela
            window.open('gerar_pdf.php', '_blank');
        });
    });
</script>

</body>

</html>



<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>