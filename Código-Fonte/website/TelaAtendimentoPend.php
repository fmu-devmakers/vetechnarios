<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=9">

    
    <link href="stylesheets/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="stylesheets/menu.css">
    <link rel="stylesheet" href="stylesheets/flat-ui-slider.css">
    <link rel="stylesheet" href="stylesheets/base.css">
    <link rel="stylesheet" href="stylesheets/skeleton.css">
    <link rel="stylesheet" href="stylesheets/landings.css">
    <link rel="stylesheet" href="stylesheets/main.css">
    <link rel="stylesheet" href="stylesheets/landings_layouts.css">
    <link rel="stylesheet" href="stylesheets/lightbox.css">
    <link rel="stylesheet" href="stylesheets/pixicon.css">
    <link href="assets/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="shortcut icon" href="images/logo V.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

<style>
     .table-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
    }

    .table {
        border-collapse: collapse;
        width: 300%;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        background-color: #cccccc;
    }

    .table th {
        font-weight: bold;
        color: #000;
    }

    .table-container .segment {
        padding-left: -10%;
    }

</style>
</head>
<body>
    <div id="page" class="page">
        <div class="pixfort_ebook_9" id="section_ebook_1">
            <div class="page_style pix_builder_bg" style="background-image: url(&quot;https://www.devel-it.org/flatpack/builder/elements/images/9_ebook/bg.png&quot;); background-color: rgb(82, 241, 241); padding-top: 0px; padding-bottom: 734px; box-shadow: none; border-color: rgb(68, 68, 68); background-size: cover; background-attachment: fixed; background-repeat: no-repeat; outline-offset: 0px;" src="images/uploads/imagem_2023-04-24_162119280.png">
                <div class="container">
                    <div class="sixteen columns">
                        <div class="eight columns alpha">
                            <div class="logo">
                                <a href="AreaVet.html">
                                    <img src="images\uploads\home_ico.png" alt="Logo">
                                </a>
                            </div>
                            <div class="text_input">
    <div class="headtext_style" style="margin-top: -115px;">
        <span class="editContent" style="display: block; margin-bottom: 10px; font-size: 24px; line-height: 32px;">
            <?php
            include('conexao.php');
            session_start();
            $nome_logado = $_SESSION['nome_vet'];
            echo "Olá Dr(a). " . $nome_logado;
            ?>
        </span>
        <span class="editContent" style="display: block; font-size: 24px; line-height: 32px;">
            Atendimentos Solicitados
        </span>
    </div>
    <div class="segment pix_builder_bg table-container" style="background-image: none; background-color: rgb(20, 20, 126); padding-top: 0px; padding-bottom: 0px; box-shadow: none; border-color: rgb(68, 68, 68); background-size: auto; background-attachment: scroll; background-repeat: repeat;" src="images/uploads/imagem_2023-04-24_162119280.png"></div>
            <?php
                include('conexao.php');

                // Função para excluir uma linha do banco de dados
                function excluirLinha($id) {
                    $query = "UPDATE solicit_atend SET atendido_pet = TRUE WHERE id_solicit = '$id'";
                    mysqli_query($conn, $query);
                }

                // Query para obter os dados do banco de dados
                $query = "SELECT id_solicit, nome_pet, idade_pet, sexo_pet, email_ctt_pet, resumo_ocorr_pet, data_solicit FROM solicit_atend WHERE atendido_pet IS FALSE";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    // Cabeçalho da tabela
                    echo "<table class='table'>";
                    echo "<tr>";
                    echo "<th>Nome do Pet</th>";
                    echo "<th>Idade do Pet</th>";
                    echo "<th>Sexo do Pet</th>";
                    echo "<th>Email de Contato</th>";
                    echo "<th>Resumo da Ocorrência</th>";
                    echo "<th>Data da Solicitação</th>";
                    echo "<th>Ação</th>";
                    echo "</tr>";

                    // Loop através dos registros do banco de dados
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['nome_pet']."</td>";
                        echo "<td>".$row['idade_pet']."</td>";
                        echo "<td>".$row['sexo_pet']."</td>";
                        echo "<td>".$row['email_ctt_pet']."</td>";
                        echo "<td>".$row['resumo_ocorr_pet']."</td>";
                        echo "<td>".$row['data_solicit']."</td>";
                        echo "<td class='delete-button'><button onclick='excluirLinha(".$row['id_solicit'].")'>Encerrar</button></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Nenhum atendimento solicitado.";
                }

                // Fechar a conexão com o banco de dados
                mysqli_close($conn);
                ?>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pixfort_ebook_9"></div>

    <script src="js-files/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery.browser = {};
        (function () {
            jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();

        function excluirLinha(id) {
            if (confirm('Tem certeza que deseja encerrar o atendimento?')) {
                $.ajax({
                    url: 'excluir_linha.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        }
    </script>
    <script src="js-files/jquery.easing.1.3.js" type="text/javascript"></script>
    <script type="text/javascript" src="js-files/jquery.common.min.js"></script>
    <script src="js-files/ticker.js" type="text/javascript"></script>
    <script src="js-files/bootstrap.min.js"></script>
    <script src="js-files/bootstrap-switch.js"></script>
    <script src="js-files/custom3.js" type="text/javascript"></script>

    <script src="assets/js/appear.min.js" type="text/javascript"></script>
    <script src="assets/js/animations.js" type="text/javascript"></script>

    <script>
    // Função para atualizar a página automaticamente
    function atualizarPagina() {
        location.reload();
    }

    // Chamar a função para atualizar a página a cada 5 segundos (5000 milissegundos)
    setInterval(atualizarPagina, 5000);
</script>
</body>
</html>
