<?php

session_start();
require_once 'database/conexao.php';
require("../../vendor/autoload.php");
require("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("../../vendor/phpmailer/phpmailer/src/SMTP.php");



$nome_empreendimento = mysqli_real_escape_string($connect, $_POST['nome_empreendimento']);
$nome_responsavel = mysqli_real_escape_string($connect, $_POST['nome_responsavel']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$cpf_responsavel = mysqli_real_escape_string($connect, $_POST['cpf_responsavel']);
$rg_responsavel = mysqli_real_escape_string($connect, $_POST['rg_responsavel']);
$data_expedicao_rg = mysqli_real_escape_string($connect, $_POST['data_expedicao_rg']);
$data_nascimento = mysqli_real_escape_string($connect, $_POST['data_nascimento']);
$naturalidade = mysqli_real_escape_string($connect, $_POST['naturalidade']);
$banco_de_deposito = mysqli_real_escape_string($connect, $_POST['banco_de_deposito']);
$agencia = mysqli_real_escape_string($connect, $_POST['agencia']);
$conta = mysqli_real_escape_string($connect, $_POST['conta']);
$chave_pix = mysqli_real_escape_string($connect, $_POST['chave_pix']);
$cep = mysqli_real_escape_string($connect, $_POST['cep']);
$endereco = mysqli_real_escape_string($connect, $_POST['rua']);
$bairro = mysqli_real_escape_string($connect, $_POST['bairro']);
$cidade = mysqli_real_escape_string($connect, $_POST['cidade']);
$estado = mysqli_real_escape_string($connect, $_POST['estado']);
$numero_casa = mysqli_real_escape_string($connect, $_POST['numero_casa']);
$complemento = mysqli_real_escape_string($connect, $_POST['complemento']);
$contato_responsavel = mysqli_real_escape_string($connect, $_POST['contato_responsavel']);
$contato_representante = mysqli_real_escape_string($connect, $_POST['contato_representante']);
$aceite_termos_e_politicas = mysqli_real_escape_string($connect, $_POST['aceite_termos_e_politicas']);
$aceite_contrato = mysqli_real_escape_string($connect, $_POST['aceite_contrato']);







$address = $endereco . "," . $bairro . "," . $cidade . "," . $estado . "," . $numero_casa . "," . $cep . "," . $complemento;
if (isset($_FILES['logo_do_cliente'])) {
	$arquivo = $_FILES['logo_do_cliente']['name'];
	$extensao = strtolower(substr($_FILES['logo_do_cliente']['name'], -4));

	$novo_nome = uniqid();
	$novo_arquivo = $novo_nome . $extensao;

	$diretorio = "../uploads/";
	$logo_do_cliente = $diretorio . $novo_arquivo;
	move_uploaded_file($_FILES['logo_do_cliente']['tmp_name'], "../../../uploads/" . $novo_arquivo);
	$cadastro_clientepf = "INSERT INTO clientes(logo_da_empresa,
	name,
	nome_responsavel,	
	email,
	phone,
	cpf,
	rg,
	data_de_expedicao_rg,
	data_nascimento_responsavel,
	naturalidade,
	banco_de_deposito,
	agencia,
	conta,
	chave_pix,
	cep,
	rua,
	bairro,
	cidade,
	estado,
	numero,
	complemento,
	contato_responsavel_legal,
	contato_representante,
	aceite_do_contrato,
	aceite_do_politicas_de_privacidade,
	aceite_do_termos_de_uso,
	address,
	status,
	created_at,
	active) 
	values ('$logo_do_cliente',
	'$nome_empreendimento',
	'$nome_responsavel',	
	'$email',
	'$contato_responsavel',	
	'$cpf_responsavel',
	'$rg_responsavel',
	'$data_expedicao_rg',
	'$data_nascimento',
	'$naturalidade',
	'$banco_de_deposito',
	'$agencia',
	'$conta',
	'$chave_pix',
	'$cep',
	'$endereco',
	'$bairro',
	'$cidade',
	'$estado',
	'$numero_casa',
	'$complemento',
	'$contato_responsavel',
	'$contato_representante',
	'$aceite_contrato',
	'$aceite_termos_e_politicas',
	'$aceite_termos_e_politicas',
	'$address',
	1,
	now(),
	1)";

	$cad_pf = mysqli_query($connect, $cadastro_clientepf);



	if ($cad_pf) {
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
		if (!$mail->Send()) {
			$resultado = "Mailer Error: " . $mail->ErrorInfo;
		} else {
			$resultado =  "foi";
		}

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
