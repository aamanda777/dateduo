<?php
// cadastro.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de cadastro
    $nomeMembro1 = $_POST['nome_membro_1'];
    $nomeMembro2 = $_POST['nome_membro_2'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 

    // Conectar ao banco de dados usando mysqli
    $conn = new mysqli("localhost", "root", "", "dateduo");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro de conexão ao banco de dados: " . $conn->connect_error);
    }

    // Inserir dados no banco de dados usando prepared statement
    $stmt = $conn->prepare("INSERT INTO casais (nome_membro_1, nome_membro_2, email, usuario, senha) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nomeMembro1, $nomeMembro2, $email, $usuario, $senha);
    $result = $stmt->execute();

    if ($result) {
        // Cadastro realizado com sucesso, redirecionar para a página de login
        header("Location: login.html");
        exit;
    } else {
        echo "Erro ao cadastrar. Por favor, tente novamente.";
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>
