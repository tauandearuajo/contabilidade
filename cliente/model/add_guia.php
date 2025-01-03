<?php

session_start();
require_once 'database/conexao.php';

date_default_timezone_set('America/Sao_Paulo');
$name = mysqli_real_escape_string($connect, $_POST['name']);
$mounth = mysqli_real_escape_string($connect, $_POST['mounth']);
$time = date('h:m');
$date = mysqli_real_escape_string($connect, $_POST['date']);
$type = mysqli_real_escape_string($connect, $_POST['type']);
$value = mysqli_real_escape_string($connect, $_POST['value']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$created_at = date('d-m-y');




if (isset($_FILES['document'])) {
    $arquivo = $_FILES['document']['name'];
   $extensao = strtolower(substr($_FILES['document']['name'], -4));

    
    $novo_arquivo = $name . $extensao;

    $diretorio = "uploads/";
    $document = $diretorio . $novo_arquivo;
    move_uploaded_file($_FILES['document']['tmp_name'], "../uploads/" . $novo_arquivo);

    $cadastro_clientepf = "INSERT INTO guides_and_documents(name,document,mounth,time,date,type,value,client_id,created_at)
	values ('$name','$document','$mounth','$time','$date','$type','$value','$client_id','$created_at')";

    $cad_pf = mysqli_query($connect, $cadastro_clientepf);

    

    if ($cad_pf) {

        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Profissional $name, cadastrado com sucesso</div>";

        header('Location: ../guiasedocumentos.php?sucesso');
    } else {

        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);


        echo mysqli_error($connect);
    }
}
