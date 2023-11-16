<?php
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

// Verificar se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function validar_dados($dados)
    {
        return is_string($dados) ? htmlspecialchars(trim($dados)) : '';
    }

    // Iniciar a transação
    $conn->begin_transaction();

    try {
        // Validar e obter os dados do formulário do membro 1
        $entradaMembro1 = validar_dados($_POST['entradaMembro1']);
        $pratoPrincipalMembro1 = validar_dados($_POST['pratoPrincipalMembro1']);
        $sobremesaMembro1 = validar_dados($_POST['sobremesaMembro1']);
        $bebidaMembro1 = validar_dados($_POST['bebidaMembro1']);

        // Validar e obter os dados do formulário do membro 2
        $entradaMembro2 = validar_dados($_POST['entradaMembro2']);
        $pratoPrincipalMembro2 = validar_dados($_POST['pratoPrincipalMembro2']);
        $sobremesaMembro2 = validar_dados($_POST['sobremesaMembro2']);
        $bebidaMembro2 = validar_dados($_POST['bebidaMembro2']);

        // Inserir os dados na tabela 'escolhas_casal'
        $stmt = $conn->prepare("INSERT INTO escolhas_casal (entrada_membro_1, prato_principal_membro_1, sobremesa_membro_1, bebida_membro_1, entrada_membro_2, prato_principal_membro_2, sobremesa_membro_2, bebida_membro_2) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssss", $entradaMembro1, $pratoPrincipalMembro1, $sobremesaMembro1, $bebidaMembro1, $entradaMembro2, $pratoPrincipalMembro2, $sobremesaMembro2, $bebidaMembro2);

        if ($stmt->execute()) {
            // Commit se a execução for bem-sucedida
            $conn->commit();
            echo "success";
        } else {
            // Rolar de volta se houver um erro
            $conn->rollback();
            echo "error";
        }

        $stmt->close();
    } catch (Exception $e) {
        // Rolar de volta em caso de exceção
        $conn->rollback();
        echo "error";
    }
} else {
    echo "error";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
