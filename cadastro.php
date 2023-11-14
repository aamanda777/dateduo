<?php
// cadastro.php

session_start(); // Inicie a sessão se ainda não estiver iniciada

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de cadastro
    $nomeMembro1 = $_POST['nome_membro_1'];
    $nomeMembro2 = $_POST['nome_membro_2'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verificar se todos os campos estão preenchidos
    if (empty($nomeMembro1) || empty($nomeMembro2) || empty($email) || empty($usuario) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Verificar se a senha tem pelo menos 5 caracteres
    if (strlen($senha) < 5) {
        echo "A senha deve ter pelo menos 5 caracteres.";
        exit;
    }

    // Verificar a validade do email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, insira um endereço de email válido.";
        exit;
    }

    // Hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Conectar ao banco de dados usando mysqli
    $conn = new mysqli("localhost", "root", "", "dateduo");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro de conexão ao banco de dados: " . $conn->connect_error);
    }

    // Verificar unicidade de email e nome de usuário
    $stmt = $conn->prepare("SELECT * FROM casais WHERE email = ? OR usuario = ?");
    $stmt->bind_param("ss", $email, $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['email'] === $email) {
            echo "Email já cadastrado. Por favor, escolha outro.";
            exit;
        }
        if ($row['usuario'] === $usuario) {
            echo "Nome de usuário já cadastrado. Por favor, escolha outro.";
            exit;
        }
    }

    // Inserir dados no banco de dados usando prepared statement
    $stmt = $conn->prepare("INSERT INTO casais (nome_membro_1, nome_membro_2, email, usuario, senha) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nomeMembro1, $nomeMembro2, $email, $usuario, $senhaHash);
    $result = $stmt->execute();

    if ($result) {
        // Cadastro realizado com sucesso, redirecionar para a página de login

        
        $_SESSION['nome_membro_1'] = $nomeMembro1;
        $_SESSION['nome_membro_2'] = $nomeMembro2;

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
