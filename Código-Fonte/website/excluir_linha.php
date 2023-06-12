<?php
// inclua o arquivo de conexão com o banco de dados
include('conexao.php');

// verifique se o ID foi fornecido via solicitação POST
if (isset($_POST['id'])) {
    // obtenha o ID da solicitação POST
    $id = $_POST['id'];

    // crie a consulta para excluir a linha com o ID especificado
    $query = "UPDATE solicit_atend SET atendido_pet = TRUE WHERE id_solicit = '$id'";

    // execute a consulta
    if (mysqli_query($conn, $query)) {
        // a exclusão foi bem-sucedida
        echo "Linha excluída com sucesso.";
    } else {
        // ocorreu um erro ao excluir a linha
        echo "Erro ao excluir a linha: " . mysqli_error($conn);
    }
} else {
    // o ID não foi fornecido
    echo "ID não fornecido.";
}

// feche a conexão com o banco de dados
mysqli_close($conn);
?>