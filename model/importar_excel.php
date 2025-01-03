<?php


session_start(); // Iniciar a sessão

// Limpar o buffer de saída
ob_start();


date_default_timezone_set('America/Sao_Paulo');

// Incluir a conexão com banco de dados
include_once "database/connection.php";

// Receber o arquivo do formulário
$arquivo = $_FILES['import_servers'];
//var_dump($arquivo);

// Variáveis de validação
$primeira_linha = true;
$linhas_importadas = 0;
$linhas_nao_importadas = 0;
$usuarios_nao_importado = "";
$created_at = date('d-m-y');

// Verificar se é arquivo csv
if ($arquivo['type'] == "text/csv") {

    // Ler os dados do arquivo
    $dados_arquivo = fopen($arquivo['tmp_name'], "r");

    // Percorrer os dados do arquivo
    while ($linha = fgetcsv($dados_arquivo, 1000, ";")) {

        // Como ignorar a primeira linha do Excel
        if ($primeira_linha) {
            $primeira_linha = false;
            continue;
        }

        // Usar array_walk_recursive para criar função recursiva com PHP
        array_walk_recursive($linha, 'converter');
        //var_dump($linha);

        // Criar a QUERY para salvar o usuário no banco de dados
        $query_usuario = "INSERT INTO clients(photo,name,cpf,date_of_birth,created_at) 
VALUES (:photo,:name,:cpf,:date_of_birth,:created_at)";

        // Preparar a QUERY
        $cad_usuario = $conn->prepare($query_usuario);

        // Substituir os links da QUERY pelos valores     
        $cad_usuario->bindValue(':photo', ($linha[0] ?? "NULL"));  
        $cad_usuario->bindValue(':name', ($linha[1] ?? "NULL"));
        $cad_usuario->bindValue(':cpf', ($linha[2] ?? "NULL"));
        $cad_usuario->bindValue(':date_of_birth', ($linha[3] ?? "NULL"));
        $cad_usuario->bindValue(':created_at', ($linha[4] ?? "NULL"));

        // Executar a QUERY
        $cad_usuario->execute();

        // Verificar se cadastrou corretamente no banco de dados
        if ($cad_usuario->rowCount()) {
            $linhas_importadas++;
        } else {
            $linhas_nao_importadas++;
            $usuarios_nao_importado = $usuarios_nao_importado . ", " . ($linha[0] ?? "NULL");
        }
    }

    // Criar a mensagem com os CPF dos usuários não cadastrados no banco de dados
    if (!empty($usuarios_nao_importado)) {
        $usuarios_nao_importado = "Usuários não importados: $usuarios_nao_importado.";
    }

    // Mensagem de sucesso
    $_SESSION['msg'] = "<div class='alert alert-succes bg-success text-center' role='alert' style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>$linhas_importadas linha(s) importa(s), $linhas_nao_importadas linha(s) não importada(s). $usuarios_nao_importado</div>";

    // Redirecionar o usuário
    header("Location: ../clientes.php");
} else {

    // Mensagem de erro
    $_SESSION['msg'] = "<div class='alert alert-succes bg-info text-center' role='alert' style='  font-size:19px;'>Necessário enviar arquivo csv!</p>";

    // Redirecionar o usuário
    header("Location: ../clientes.php");
}

// Criar função valor por referência, isto é, quando alter o valor dentro da função, vale para a variável fora da função.
function converter(&$dados_arquivo)
{
    // Converter dados de ISO-8859-1 para UTF-8
    $dados_arquivo = mb_convert_encoding($dados_arquivo, "UTF-8", "ISO-8859-1");
}
