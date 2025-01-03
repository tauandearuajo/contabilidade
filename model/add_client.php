<?php

session_start();
require_once 'database/conexao.php';
require("../vendor/autoload.php");
require("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("../vendor/phpmailer/phpmailer/src/SMTP.php");



$name = mysqli_real_escape_string($connect, $_POST['name_client']);
$email = mysqli_real_escape_string($connect, $_POST['email_client']);


$password = "Projeto@".uniqid();

$cadastro_clientepf = "INSERT INTO clients(name,email,created_at) 
	values ('$name','$email',now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);

   


if ($cad_pf) {

    header('Location: ../clientes.php?sucesso');
} else {

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    echo mysqli_error($connect);
}
