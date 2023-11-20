<?php
declare(strict_types=1);
session_start();
if (!isset($_SESSION['nome_membro_1'])) {
    header('location:login.html');
    die;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio do Date</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3c48893ee2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="js\date.js"></script>
</head>

<body class="min-h-screen flex items-center justify-center">

    <!-- Barra de navegação -->
    <nav class="bg-red-500 text-white p-4 absolute top-0 left-0 right-0">
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


    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-8">Gerador de Cardápio</h2>

        <form id="comidaBebidaForm" action="processa_date.php" method="post">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Coluna para membro 1 -->
                <div class="flex flex-col h-full">
                    <h3 class="text-xl font-semibold mb-4">
                        <?php echo $_SESSION['nome_membro_1']; ?>, escolha seu cardápio:
                    </h3>

                    <div class="mb-6 flex items-center">
                        <i class="fas fa-seedling text-red-500 mr-2"></i>
                        <input type="text" name="entradaMembro1" id="entradaMembro1" placeholder="Escolha a Entrada"
                            class="p-4 border rounded-full w-full" required>
                    </div>
                    <div class="mb-6 flex items-center">
                        <i class="fas fa-utensils text-red-500 mr-2"></i>
                        <input type="text" name="pratoPrincipalMembro1" id="pratoPrincipalMembro1"
                            placeholder="Escolha o Prato Principal" class="p-4 border rounded-full w-full" required>
                    </div>
                    <div class="mb-6 flex items-center">
                        <i class="fas fa-ice-cream text-red-500 mr-2"></i>
                        <input type="text" name="sobremesaMembro1" id="sobremesaMembro1"
                            placeholder="Escolha a Sobremesa" class="p-4 border rounded-full w-full" required>
                    </div>
                    <div class="mb-6 flex items-center">
                        <i class="fa-solid fa-champagne-glasses mr-2 text-red-600"></i>
                        <input type="text" name="bebidaMembro1" id="bebidaMembro1" placeholder="Escolha a bebida"
                            class="p-4 border rounded-full w-full" required>
                    </div>

                </div>

                <!-- Coluna para membro 2 -->
                <div class="flex flex-col h-full">
                    <h3 class="text-xl font-semibold mb-4">
                        <?php echo $_SESSION['nome_membro_2']; ?>, escolha seu cardápio:
                    </h3>

                    <div class="mb-6 flex items-center">
                        <i class="fas fa-seedling text-red-500 mr-2"></i>
                        <input type="text" name="entradaMembro2" id="entradaMembro2" placeholder="Escolha a Entrada"
                            class="p-4 border rounded-full w-full" required>
                    </div>
                    <div class="mb-6 flex items-center">
                        <i class="fas fa-utensils text-red-500 mr-2"></i>
                        <input type="text" name="pratoPrincipalMembro2" id="pratoPrincipalMembro2"
                            placeholder="Escolha o Prato Principal" class="p-4 border rounded-full w-full" required>
                    </div>
                    <div class="mb-6 flex items-center">
                        <i class="fas fa-ice-cream text-red-500 mr-2"></i>
                        <input type="text" name="sobremesaMembro2" id="sobremesaMembro2"
                            placeholder="Escolha a Sobremesa" class="p-4 border rounded-full w-full" required>
                    </div>
                    <div class="mb-6 flex items-center">
                        <i class="fa-solid fa-champagne-glasses mr-2 text-red-600"></i>
                        <input type="text" name="bebidaMembro2" id="bebidaMembro2" placeholder="Escolha a bebida"
                            class="p-4 border rounded-full w-full " required>
                    </div>


                </div>
            </div>
            <button type="submit" id="btnSubmit"
                class="mt-8 p-4 bg-red-500 hover:bg-red-700 text-white rounded-full w-full transition duration-300 focus:outline-none focus:shadow-outline-red active:bg-red-800">
                Sortear
            </button>
        </form>

    </div>

</body>

</html>