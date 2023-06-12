<?php
include('conexao.php');

// Obtém os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$confirma_email = $_POST['confirma_email'];
$senha = $_POST['senha'];

// Verifica se o e-mail já está presente na tabela
$sqlVerificaEmail = "SELECT COUNT(*) AS total FROM cad_vet WHERE EMAIL_VET = '$email'";
$resultadoVerificaEmail = $conn->query($sqlVerificaEmail);

if ($resultadoVerificaEmail->num_rows > 0) {
    $row = $resultadoVerificaEmail->fetch_assoc();
    $total = $row['total'];

    if ($total > 0) {
        // O e-mail já está em uso
        echo "<script>alert('Este e-mail já está sendo usado.'); window.location.href = 'http://localhost/website/cadastroUser.html';</script>";
        exit;
    }
}

// Gera o hash da senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Prepara e executa a query de inserção
$sql = "INSERT INTO cad_vet (NOME_VET, EMAIL_VET, SENHA_VET) VALUES ('$nome', '$email', '$senhaHash')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Dados inseridos com sucesso'); window.location.href = 'http://localhost/website/loginUser.html';</script>";
} else {
    echo "<script>alert('Erro ao inserir dados: " . $conn->error . "');</script>";
}

// Fecha a conexão
$conn->close();
?>

