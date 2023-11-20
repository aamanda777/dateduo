<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

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

if ($resultados && $resultados->num_rows > 0) {
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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Sorteio</title>
    <script src="js/sorteio.js">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Junge&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Barra de Navegação -->
    <nav class="bg-red-500 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="h-16">
                <!-- Logo do site -->
                <img src="img/logo.png" alt="Logo" class="h-full w-auto">
            </div>
            <div>
                <!-- Link de Logout -->
                <a href="logout.php" class="hover:text-white"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-8 max-w-2xl text-center">

        <h2 class="text-4xl font-semibold mb-9 font">Resultado do Sorteio</h2>

        <div class="mb-8">
            <!-- Entrada -->
            <div class="flex items-center mb-9">
                <span class="text-red-600 font-semibold text-xl"> <i
                        class="fas fa-seedling text-red-800 mr-2"></i>Entrada:</span>
                <p class="ml-2">
                    <?php echo $entradaSorteio; ?>
                </p>
            </div>

            <!-- Prato Principal -->
            <div class="flex items-center mb-9">
                <span class="text-red-600 font-semibold text-xl"><i class="fas fa-utensils text-red-800 mr-2"></i>Prato
                    Principal:</span>
                <p class="ml-2">
                    <?php echo $pratoPrincipalSorteio; ?>
                </p>
            </div>

            <!-- Sobremesa -->
            <div class="flex items-center mb-9">
                <span class="text-red-600 font-semibold text-xl"> <i
                        class="fas fa-ice-cream text-red-800 mr-2"></i>Sobremesa:</span>
                <p class="ml-2">
                    <?php echo $sobremesaSorteio; ?>
                </p>
            </div>

            <!-- Bebida -->
            <div class="flex items-center mb-8">
                <span class="text-red-600 font-semibold text-xl"> <i
                        class="fa-solid fa-champagne-glasses mr-2 text-red-800"></i>Bebida:</span>
                <p class="ml-2">
                    <?php echo $bebidaSorteio; ?>
                </p>
            </div>
        </div>


        <!-- Bolinha com ícone do WhatsApp -->
        <div class="absolute right-8 bottom-8">
            <a href="#" id="compartilharWhatsapp"
                class="bg-green-500 hover:bg-green-700 text-white font-bold p-4 rounded-full inline-flex items-center justify-center">
                <i class="fab fa-whatsapp text-3xl"></i>
            </a>
        </div>

    </div>

</body>

</html>






<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>