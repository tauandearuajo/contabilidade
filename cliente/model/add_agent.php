<?php

session_start();
require_once 'database/conexao.php';

date_default_timezone_set('America/Sao_Paulo');
$name = mysqli_real_escape_string($connect, $_POST['name']);
$cpf = mysqli_real_escape_string($connect, $_POST['cpf']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$phone = mysqli_real_escape_string($connect, $_POST['telefone']);
//$date_of_birth = mysqli_real_escape_string($connect, $_POST['data_nascimento']);
$created_at = date('d-m-y');

$password = mysqli_real_escape_string($connect, $_POST['senha']);
$repeat_password = mysqli_real_escape_string($connect, $_POST['confirmar_senha']);




//if (isset($_FILES['foto'])) {
//    $arquivo = $_FILES['foto']['name'];
//    $extensao = strtolower(substr($_FILES['foto']['name'], -4));

//    $novo_nome = uniqid();
   //// $novo_arquivo = $novo_nome . $extensao;

    //$diretorio = "uploads/";
//    $foto_do_cliente = $diretorio . $novo_arquivo;
//    move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/" . $novo_arquivo);

    $cadastro_clientepf = "INSERT INTO clients(name,cpf,phone,email,date_of_birth,created_at)
	values ('$name','$cpf','$phone','$email','$date_of_birth','$created_at')";

    $cad_pf = mysqli_query($connect, $cadastro_clientepf);

    $cadastro_user = "INSERT INTO users(name, 
email,password,repeat_password,token,status,type_user,user_level,created_at,photo_user) 
	values ('$name','$email',md5('$password'),md5('$repeat_password'),md5('$email'),'Ativo','Cliente','Cliente','$created_at','assets/img/avatar-5.png')";

    $cad_user = mysqli_query($connect, $cadastro_user);

    if ($cad_pf) {

        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Profissional $name, cadastrado com sucesso</div>";

        header('Location: ../clientes.php?sucesso');
    } else {

        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);


        echo mysqli_error($connect);
    }
//}
