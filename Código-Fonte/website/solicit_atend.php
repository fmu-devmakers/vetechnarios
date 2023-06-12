<?php

include ('conexao.php');

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores enviados pelo formulário
    $nomepet = $_POST["nomepet"];
    $idade = $_POST["idade"];
    $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";
    $email = $_POST["email"];
    $oque = $_POST["oque"];

    // Insere os valores no banco de dados
    $sql = "INSERT INTO solicit_atend (nome_pet, idade_pet, sexo_pet, email_ctt_pet, resumo_ocorr_pet) VALUES ('$nomepet', '$idade', '$sexo', '$email', '$oque')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sua solicitação foi enviada com sucesso!'); window.location.href = 'http://localhost/website/#';</script>";
    } else {
        echo "<script>alert('Erro ao inserir dados: " . $conn->error . "'); window.location.href = 'http://localhost/website/solicitAtend.html'</script>";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
