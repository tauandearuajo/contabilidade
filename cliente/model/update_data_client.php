<?php

session_start();
require_once 'database/conexao.php';



$idcliente = mysqli_real_escape_string($connect, $_POST['client_it']);
$nome = mysqli_real_escape_string($connect, $_POST['nome']);
$cpf = mysqli_real_escape_string($connect, $_POST['cpf']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$whatsapp = mysqli_real_escape_string($connect, $_POST['telefone']);
$cep = mysqli_real_escape_string($connect, $_POST['cep']);
$endereco = mysqli_real_escape_string($connect, $_POST['rua']);
$bairro = mysqli_real_escape_string($connect, $_POST['bairro']);
$cidade = mysqli_real_escape_string($connect, $_POST['cidade']);
$estado = mysqli_real_escape_string($connect, $_POST['estado']);
$numero_casa = mysqli_real_escape_string($connect, $_POST['numero']);

	$cadastro_clientepj = "UPDATE clients SET
	name = '$nome',
identification_document = '$cpf',
email = '$email',
zip_code = '$cep' ,
address = '$endereco',
district = '$bairro',
city = '$cidade',
number_home = '$numero_casa',
whatsapp_contact = '$whatsapp',
updated_at = now()  WHERE id='$idcliente'";

	$cad_pj = mysqli_query($connect, $cadastro_clientepj);


   //var_dump($cad_pj);



	if ($cad_pj) {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Cadastrado com Sucesso.\");
				</script>
			";*/

		$_SESSION['cadastradoInfo'] = "
        <div class='row'>
		<div class='col-lg-12 col-md-12'>
        <div class='alert alert-succes bg-success text-center' role='alert' 
        style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>Informações  cadastradas com sucesso!<div>
        </div>
		</div>";



		header('Location: ../client_details.php?idclient='.$idcliente);
	} else {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	*/

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

