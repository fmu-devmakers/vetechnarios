<?php
session_start();
include ('conexao.php');

// Obtém os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Busca o hash da senha armazenada no banco de dados
$sql = "SELECT senha_vet, nome_vet FROM CAD_VET WHERE email_vet = '$email'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    $row = $resultado->fetch_assoc();
    $senhaArmazenada = $row['senha_vet'];
    $nome = $row['nome_vet'];
    $_SESSION['nome_vet'] = $nome;

    // Verifica se a senha digitada coincide com o hash armazenado
    if (password_verify($senha, $senhaArmazenada)) {
        // Login bem-sucedido
        echo "<script>alert('Bem-vindo " . $nome . " ! Redirecionando para Tela Logada.'); window.location.href = 'TelaAtendimentoPend.php'; </script>";
    } else {
        // Senha incorreta
        echo "<script>alert('Senha Incorreta!'); window.location.href = 'loginUser.html'; </script>";
    }
} else {
    // Email não encontrado
    echo "<script>alert('Email não cadastrado!'); window.location.href = 'loginUser.html'; </script>";
}

// Fecha a conexão
$conn->close();
?>
