<?php

session_start();
require_once '../database/conexao.php';
require ("../../vendor/autoload.php");
require("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("../../vendor/phpmailer/phpmailer/src/SMTP.php");



$nome_empreendimento = mysqli_real_escape_string($connect, $_POST['pj_nome_fantasia']);
$razao_social = mysqli_real_escape_string($connect, $_POST['pj_razao_social']);
$cnpj = mysqli_real_escape_string($connect, $_POST['pj_cnpj']);
$contato_responsavel = mysqli_real_escape_string($connect, $_POST['pj_contato_responsavel']);
$contato_representante = mysqli_real_escape_string($connect, $_POST['pj_contato_respresentante']);
$email = mysqli_real_escape_string($connect, $_POST['pj_email_empresa']);
$email_responsavel = mysqli_real_escape_string($connect, $_POST['pj_email_responsavel']);
$cep = mysqli_real_escape_string($connect, $_POST['pj_cep']);
$endereco = mysqli_real_escape_string($connect, $_POST['pj_rua']);
$bairro = mysqli_real_escape_string($connect, $_POST['pj_bairro']);
$cidade = mysqli_real_escape_string($connect, $_POST['pj_cidade']);
$estado = mysqli_real_escape_string($connect, $_POST['pj_estado']);
$numero_casa = mysqli_real_escape_string($connect, $_POST['pj_numero_casa']);
$complemento = mysqli_real_escape_string($connect, $_POST['pj_complemento']);
$nome_responsavel = mysqli_real_escape_string($connect, $_POST['pj_nome_responsavel_local']);
$cpf_responsavel = mysqli_real_escape_string($connect, $_POST['cpf_responsavel']);
$rg_responsavel = mysqli_real_escape_string($connect, $_POST['rg_responsavel']);
$data_expedicao_rg = mysqli_real_escape_string($connect, $_POST['data_expedicao_rg']);
$data_nascimento = mysqli_real_escape_string($connect, $_POST['data_nascimento']);
$naturalidade = mysqli_real_escape_string($connect, $_POST['naturalidade']);
$banco_de_deposito = mysqli_real_escape_string($connect, $_POST['pj_banco_de_deposito']);
$agencia = mysqli_real_escape_string($connect, $_POST['pj_agencia']);
$conta = mysqli_real_escape_string($connect, $_POST['pj_conta']);
$chave_pix = mysqli_real_escape_string($connect, $_POST['pj_chave_pix']);
$aceite_termos_e_politicas = mysqli_real_escape_string($connect, $_POST['aceite_termos_e_politicas']);
$aceite_contrato = mysqli_real_escape_string($connect, $_POST['aceite_contrato']);



/**
 * Area de senha do usuario
 */


/*
    $usu_nome = mysqli_real_escape_string($connect, $nome_responsavel);
	$usu_email = mysqli_real_escape_string($connect, $email);
	$usu_senha = md5(mysqli_real_escape_string($connect, "123456789"));
	$usu_senha_antiga = md5(mysqli_real_escape_string($connect, "123456789"));
	$usu_status = "1";
	$usu_tipo_usuario = "Cliente";

	$cadastro_acesso = "INSERT INTO users(
	f_name,
	phone,
	email,
	password,
	status,
	order_count,
	wallet_balance,
	loyalty_point,
	created_at) 
	values('$usu_nome',
	'$contato_representante',
	'$usu_email',
	'$usu_senha',
	1,
	0,
	0.000,
	0.000,
	now())";
	$cadastrando_acesso =  mysqli_query($connect,$cadastro_acesso);*/



$address = $endereco . "," . $bairro . "," . $cidade . "," . $estado . "," . $numero_casa . "," . $cep . "," . $complemento;
if (isset($_FILES['pj_logo_do_cliente'])) {
	$arquivo = $_FILES['pj_logo_do_cliente']['name'];
	$extensao = strtolower(substr($_FILES['pj_logo_do_cliente']['name'], -4));

	$novo_nome = uniqid() . $extensao;

	$diretorio = "../uploads/";
	$logo_do_cliente = $diretorio . $novo_nome;
	move_uploaded_file($_FILES['pj_logo_do_cliente']['tmp_name'], "../../../uploads/". $novo_nome);
	$cadastro_clientepj = "INSERT INTO clientes(logo_da_empresa,
	name,
	nome_fantasia,
	razao_social,
	cnpj,
	phone,
	contato_responsavel_legal,
	contato_representante,	
	email,
	email_responsavel,
	cep,
	rua,
	bairro,
	cidade,
	estado,
	numero,
	complemento,
	nome_responsavel,
	cpf,
	rg,
	data_de_expedicao_rg,
	data_nascimento_responsavel,
	naturalidade,
	banco_de_deposito,
	agencia,
	conta,
	chave_pix,	
	aceite_do_contrato,
	aceite_do_politicas_de_privacidade,
	aceite_do_termos_de_uso,
	address,
	status,
	created_at,
	active) 
	values ('$logo_do_cliente',
	'$nome_empreendimento',
	'$nome_empreendimento',
	'$razao_social',
	'$cnpj',	
	'$contato_responsavel',
	'$contato_responsavel',
	'$contato_representante',	
	'$email',
	'$email_responsavel',	
	'$cep',
	'$endereco',
	'$bairro',
	'$cidade',
	'$estado',
	'$numero_casa',
	'$complemento',
	'$nome_responsavel',
	'$cpf_responsavel',
	'$rg_responsavel',
	'$data_expedicao_rg',
	'$data_nascimento',
	'$naturalidade',
	'$banco_de_deposito',
	'$agencia',
	'$conta',
	'$chave_pix',
	'$aceite_contrato',
	'$aceite_termos_e_politicas',
	'$aceite_termos_e_politicas',
	'$address',
	1,
	now(),
	1)";

	$cad_pj = mysqli_query($connect, $cadastro_clientepj);






	if ($cad_pj) {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Cadastrado com Sucesso.\");
				</script>
			";*/

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-succes bg-success text-center' role='alert' style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>Informações  cadastradas com sucesso!<div>";

        $mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP(); // enable SMTP
		$mail->CharSet = 'utf-8';
		$mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'SSL'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.hostinger.com";
 $mail->Port = 587; // or 587
 $mail->IsHTML(true);
 $mail->Username = "naoresponda@pezinhodelivery.com.br";
 $mail->Password = "Projeto@228638";
 $mail->SetFrom("naoresponda@pezinhodelivery.com.br");
		$mail->Subject = "Solicitação de orçamento";
		$mail->Body = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    
        <style>
            *{margin: 0; list-style: none;padding: 0;}
            .logo_img{
                padding-top: 30px;
                align-items: center !important;
            }
            header{
                background-color: rgb(17, 31, 77);
                width: 100%;
                height: 200px;
                position: relative;
                align-content: center;
                align-items: center;
                align-self: center;
                text-align: center;
            }
            .cabecario_titulo{
                font-size: 19px;
                color: rgb(255, 255, 255);
                font-weight: bold;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                text-align: center;
                padding-top: 25px;
                padding-bottom: 25px;
            }
            main{
                align-items: center;
                text-align: center;
                align-content: center;
            }
            #caixa{
                width: 100%;
                text-align: center;
                align-items: center;
            }
            p{
                font-size: 19px;
                color: rgb(255, 255, 255);
                font-weight: bold;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                width: 700px;
                text-align: justify;
            }
            .corpo_texto{
                width: 700px; 
        margin-left: auto;
        margin-right: auto; 
        padding-bottom: 50px;
            }
        </style>
    </head>
    <body style='background-color: rgb(17, 31, 77);'>
        <header>
            <img class='logo_img' src='http://cadastro.pezinhodelivery.com/assets/img/logomarca.png' width='350' alt=''>
        </header>
        <Main>
            <div class='caixa'>
                <div class='cabecario_titulo'>
                    <h3>Seja bem vindo a Pezinho Delivery®</h3>
                </div>
                <div class='corpo_texto'>
                    <p>
                        Seja bem vindo a Pezinho Delivery lojista. Estamos felizes em ter você conosco. Nosso time comercial logo entrará em contato  para te orientar como usar. ou vc pode ver em nosso fórum.
    Se você está aqui é por que analisou o custo e benefício e viu o quanto é satisfatório estar conosco.
                    </p>
                </div>
            </div>
            <img src='http://cadastro.pezinhodelivery.com/assets/img/corpo_template.jpeg' width='100%' alt=''>
        </Main>
    </body>
    </html>";
		$mail->AddAddress($email);
		   if(!$mail->Send()) {
			 $resultado = "Mailer Error: " . $mail->ErrorInfo;
		   } else {
			 $resultado =  "foi";}

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
}
