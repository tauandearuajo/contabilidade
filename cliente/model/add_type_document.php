<?php

session_start();
require_once 'database/conexao.php';

date_default_timezone_set('America/Sao_Paulo');
$created_at = date('d-m-y');
$name = mysqli_real_escape_string($connect, $_POST['name_typedocument']);




$cadastro_clientepf = "INSERT INTO document_type(name,created_at) 
	values ('$name','$created_at')";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);

   


if ($cad_pf) {

    header('Location: ../tipos_documentos.php?sucesso');
} else {

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    echo mysqli_error($connect);
}
