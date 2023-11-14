<?php
// processa_login.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de login
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados usando mysqli
    $conn = new mysqli("localhost", "root", "", "dateduo");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro de conexão ao banco de dados: " . $conn->connect_error);
    }

    // Consultar o banco de dados para verificar as credenciais
    $stmt = $conn->prepare("SELECT * FROM casais WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
            if (password_verify($senha, $row['senha'])) {
                // Credenciais corretas, armazenar informações do usuário na sessão
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['nome_membro_1'] = $row['nome_membro_1'];
                $_SESSION['nome_membro_2'] = $row['nome_membro_2'];
    
                // Redirecionar para a página date.html
                header("Location: date.html");
                exit;
            } else {
                echo "Senha incorreta. Por favor, tente novamente.";
            }
        } else {
            echo "Usuário não encontrado. Por favor, verifique suas credenciais.";
        }
    
        // Fechar a conexão
        $stmt->close();
        $conn->close();
    }
    ?>