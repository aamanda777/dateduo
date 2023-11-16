<?php
declare(strict_types=1);
session_start();
if (!isset($_SESSION['nome_membro_1'])) {
    header('location:login.html');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Date</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js\date.js"></script>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-8">

        <h2 class="text-3xl font-semibold mb-8">Gerador de Date</h2>

        <form id="comidaBebidaForm" action="processa_date.php" method="post">
            <div class="grid grid-cols-2 gap-8">
                <!-- Coluna para membro 1 -->
                <div>
                    <h3 class="text-xl font-semibold mb-4"><?php echo $_SESSION['nome_membro_1']; ?>, escolha seu cardápio:</h3>

                    <label for="entradaMembro1" class="block mb-2">Entrada:</label>
                    <input type="text" name="entradaMembro1" id="entradaMembro1" placeholder="Escolha a Entrada"
                        class="mb-4 p-2 border rounded" required>

                    <label for="pratoPrincipalMembro1" class="block mb-2">Prato Principal:</label>
                    <input type="text" name="pratoPrincipalMembro1" id="pratoPrincipalMembro1"
                        placeholder="Escolha o Prato Principal" class="mb-4 p-2 border rounded" required>

                    <label for="sobremesaMembro1" class="block mb-2">Sobremesa:</label>
                    <input type="text" name="sobremesaMembro1" id="sobremesaMembro1" placeholder="Escolha a Sobremesa"
                        class="mb-4 p-2 border rounded" required>

                    <label for="bebidaMembro1" class="block mb-2">Bebida:</label>
                    <input type="text" name="bebidaMembro1" id="bebidaMembro1" placeholder="Escolha a Bebida"
                        class="mb-4 p-2 border rounded" required>
                </div>

                <!-- Coluna para membro 2 -->
                <div>
                    <h3 class="text-xl font-semibold mb-4"><?php echo $_SESSION['nome_membro_2']; ?>, escolha seu cardápio:</h3>

                    <label for="entradaMembro2" class="block mb-2">Entrada:</label>
                    <input type="text" name="entradaMembro2" id="entradaMembro2" placeholder="Escolha a Entrada"
                        class="mb-4 p-2 border rounded" required>

                    <label for="pratoPrincipalMembro2" class="block mb-2">Prato Principal:</label>
                    <input type="text" name="pratoPrincipalMembro2" id="pratoPrincipalMembro2"
                        placeholder="Escolha o Prato Principal" class="mb-4 p-2 border rounded" required>

                    <label for="sobremesaMembro2" class="block mb-2">Sobremesa:</label>
                    <input type="text" name="sobremesaMembro2" id="sobremesaMembro2" placeholder="Escolha a Sobremesa"
                        class="mb-4 p-2 border rounded" required>

                    <label for="bebidaMembro2" class="block mb-2">Bebida:</label>
                    <input type="text" name="bebidaMembro2" id="bebidaMembro2" placeholder="Escolha a Bebida"
                        class="mb-4 p-2 border rounded" required>
                </div>
            </div>

            <button type="submit" class="mt-4 p-2 bg-blue-500 text-white rounded" id="btnSubmit">Avançar</button>
        </form>

    </div>

</body>

</html>
