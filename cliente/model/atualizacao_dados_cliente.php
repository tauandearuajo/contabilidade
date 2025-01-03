<?php

session_start();
require_once '../database/conexao.php';



$idcliente = mysqli_real_escape_string($connect, $_POST['cli_id']);
$nome_empreendimento = mysqli_real_escape_string($connect, $_POST['cli_nome_fantasia']);
$razao_social = mysqli_real_escape_string($connect, $_POST['cli_razao_social']);
$cnpj = mysqli_real_escape_string($connect, $_POST['cli_cnpj']);
$email = mysqli_real_escape_string($connect, $_POST['cli_email']);
$email_responsavel = mysqli_real_escape_string($connect, $_POST['cli_email_responsavel']);
$contato_responsavel = mysqli_real_escape_string($connect, $_POST['cli_telefone']);
$contato_representante = mysqli_real_escape_string($connect, $_POST['cli_telefone_repre']);
$nome_responsavel = mysqli_real_escape_string($connect, $_POST['cli_repsonsavel_empre']);
$cpf_responsavel = mysqli_real_escape_string($connect, $_POST['cli_cpf']);
$rg_responsavel = mysqli_real_escape_string($connect, $_POST['cli_rg']);
$data_expedicao_rg = mysqli_real_escape_string($connect, $_POST['cli_data_exp_rg']);
$data_nascimento = mysqli_real_escape_string($connect, $_POST['cli_data_nascimento']);
$naturalidade = mysqli_real_escape_string($connect, $_POST['cli_naturalidade']);
$cep = mysqli_real_escape_string($connect, $_POST['cli_cep']);
$endereco = mysqli_real_escape_string($connect, $_POST['cli_rua']);
$bairro = mysqli_real_escape_string($connect, $_POST['cli_bairro']);
$cidade = mysqli_real_escape_string($connect, $_POST['cli_cidade']);
$estado = mysqli_real_escape_string($connect, $_POST['cli_estado']);
$numero_casa = mysqli_real_escape_string($connect, $_POST['cli_numero']);
$complemento = mysqli_real_escape_string($connect, $_POST['cli_complemento']);
$status = mysqli_real_escape_string($connect, $_POST['cli_status']);
$banco_de_deposito = mysqli_real_escape_string($connect, $_POST['cli_banco']);
$agencia = mysqli_real_escape_string($connect, $_POST['cli_agencia']);
$conta = mysqli_real_escape_string($connect, $_POST['cli_conta']);
$chave_pix = mysqli_real_escape_string($connect, $_POST['cli_chave_pix']);


$address = $endereco . "," . $bairro . "," . $cidade . "," . $estado . "," . $numero_casa . "," . $cep . "," . $complemento;

	$cadastro_clientepj = "UPDATE clientes SET
	name = '$nome_empreendimento',
	nome_fantasia = '$nome_empreendimento',
	razao_social = '$razao_social',
	cnpj = '$cnpj',
	phone = '$contato_responsavel',
	contato_responsavel_legal = '$contato_responsavel',
	contato_representante = '$contato_representante',	
	email = '$email',
	email_responsavel = '$email_responsavel',
	cep = '$cep',
	rua = '$endereco',
	bairro = '$bairro',
	cidade = '$cidade',
	estado = '$estado',
	numero = '$numero_casa',
	complemento = '$complemento',
	nome_responsavel = '$nome_responsavel',
	cpf = '$cpf_responsavel',
	rg = '$rg_responsavel',
	data_de_expedicao_rg = '$data_expedicao_rg',
	data_nascimento_responsavel = '$data_nascimento',
	naturalidade = '$naturalidade',
	banco_de_deposito ='$banco_de_deposito',
	agencia ='$agencia',
	conta = '$conta',
	chave_pix ='$chave_pix',
	address = '$address',
	status = '$status',
	active = '$status' WHERE id='$idcliente'";

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



		header('Location: ../../painel.php?sucesso');
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

