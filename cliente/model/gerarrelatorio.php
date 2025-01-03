<?php

// Carregar o Composer
require 'vendor/autoload.php';
require("vendor/autoload.php");

require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");
require 'database/conexao.php';
date_default_timezone_set('America/Sao_Paulo');


//$site_id = mysqli_escape_string($connect, $_POST['site_id']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);
$_SESSION['idreport'] = $report_id;
// AQUI ELE PEGA O NOME DO SITE
$site_name = mysqli_escape_string($connect, $_POST['site_name']);
$client_name = mysqli_escape_string($connect, $_POST['client_name']);
//$created_at = date('d-m-Y H:i:s');

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(["enable_remote"=>true]);

ob_start();
require "relatoriofinal.php";

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml(ob_get_clean());

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
//$dompdf->stream("documento_para_download.pdf", array("Attachment" =>true)); 
$nomedocumento = "relatório_".$site_name."_do_cliente_".$client_name."_".uniqid().".pdf";
file_put_contents('../uploads/'.$nomedocumento,$dompdf->output());
file_put_contents('../../relatorios/'.$nomedocumento,$dompdf->output());

$_FILES['TESTE'] = $nomedocumento;
$sql_relatorio = "UPDATE reports SET report_document='$nomedocumento' where  report_id='$report_id')";
$cad_relatorio = mysqli_query($connect,$sql_relatorio);

$arquivo_env = "./uploads/".$nomedocumento;
if($cad_relatorio){
    $_SESSION['cadastradoInfo'] = "<div class='alert alert-succes bg-success text-center' role='alert' 
    style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>O relatório foi gerado e encaminhado ao cliente!<div>";

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->CharSet = 'utf-8';
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'SSL'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.vantechdobrasil.com.br ";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->Username = "naoresponda@vantechdobrasil.com.br";
    $mail->Password = "Projeto@228638";
    $mail->SetFrom("naoresponda@vantechdobrasil.com.br", "Site - $site_name");
    $mail->Subject = "Relatório de zeladoria";
   // $mail->AddAttachment('uploads/',$_FILES['TESTE']);
    $mail->Body = "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    
        <style>
            * {
                margin: 0;
                list-style: none;
                padding: 0;
            }
    
            
    
            header {
                background-color: rgb(17, 31, 77);
                width: 100%;
                height: 200px;
                position: relative;
                align-content: center;
                align-items: center;
                align-self: center;
                text-align: center;
            }
    
            .cabecario_titulo {
                font-size: 19px;
                color: rgb(29, 29, 29);
                font-weight: bold;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                text-align: center;
                padding-top: 25px;
                padding-bottom: 25px;
            }
    
            main {
                align-items: center;
                text-align: center;
                align-content: center;
            }
    
            #caixa {
                width: 100%;
                text-align: center;
                align-items: center;
            }
    
            p {
                font-size: 19px;
                color: rgb(37, 37, 37);
                font-weight: bold;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                width: 700px;
                text-align: justify;
                text-align: center;
            }
    
            .corpo_texto {
                width: 700px;
                margin-left: auto;
                margin-right: auto;
                padding-bottom: 50px;
            }
            .btn_link{
                width: 150px;
                height: 60px;
                background-color: #000522;
                text-decoration: none;
                color: #fff;
                padding: 30px 30px;
                border-radius: 15px;
            }
            .btn_facebook{
                background: #3D94F6;
       background-image: -webkit-linear-gradient(top, #1E62D0);
       background-image: -moz-linear-gradient(top, #3D94F6, #1E62D0);
       background-image: -ms-linear-gradient(top, #3D94F6, #1E62D0);
       background-image: -o-linear-gradient(top, #3D94F6, #1E62D0);
       -webkit-border-radius: 20px;
       -moz-border-radius: 20px;
       border-radius: 20px;
       color: #FFFFFF;
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       font-size: 25px;
       font-weight: bold;
       padding: 20px;
       border: solid #337FED 1px;
       text-decoration: none;
       display: inline-block;
       cursor: pointer;
       text-align: center;
            }
            .btn_whatsapp{
                background: #00a884;
       background-image: -webkit-linear-gradient(top, #00a884);
       background-image: -moz-linear-gradient(top,  #00a884);
       background-image: -ms-linear-gradient(top,  #00a884);
       background-image: -o-linear-gradient(top,  #00a884);
       -webkit-border-radius: 20px;
       -moz-border-radius: 20px;
       border-radius: 20px;
       color: #FFFFFF;
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       font-size: 25px;
       font-weight: bold;
       padding: 20px;
       border: solid #00a884 1px;
       text-decoration: none;
       display: inline-block;
       cursor: pointer;
       text-align: center;
            }
        </style>
    </head>
    
    <body style='background-color: rgb(252, 252, 252);'>
    
        
        <Main>
            <div class='caixa'><br><br>
                <div class='cabecario_titulo'>
                    <h3>O relatorio $nomedocumento foi atualizado e corrigido, segue o relatorio feito pela equipe Vantech®</h3>
                </div>
                <div class='corpo_texto'>
                    <p>
                    Olá, cliente $client_name, segue o relatório corrigido, clique abaixo para acessa-lo e baixa-lo.
                    </p>
                    <p>
                        Clique abaixo e acesse a area do cliente<br><br><br><br>
                        <a class='btn_link'style='color:white;' href='https://vantechdobrasil.com.br/app/relatorios/$nomedocumento' target='_blank'>Baixar relatório</a>
                    </p><br><br>
                </div>
            </div>
            
        </Main>
    
    </body>
    
    </html>";
    $mail->AddAddress($client_email);
    if (!$mail->Send()) {
        $resultado = "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $resultado =  "foi";
    }

    header("Location: .../relatorio.php");
}
else{
    echo mysqli_error($connect);
}
