<?php
$servername = "localhost"; // substitua pelo nome do servidor do seu banco de dados
$username = "root"; // substitua pelo seu nome de usuário do banco de dados
$password = ""; // substitua pela sua senha do banco de dados
$dbname = "bd_vetech"; // substitua pelo nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>