<?php

session_start();
require_once '../database/conexao.php';



$fun_id = mysqli_real_escape_string($connect, $_POST['fun_id']);
$fun_Nome = mysqli_real_escape_string($connect, $_POST['fun_nome']);
$fun_cpf = mysqli_real_escape_string($connect, $_POST['fun_cpf']);
$fun_rg = mysqli_real_escape_string($connect, $_POST['fun_rg']);
$fun_email = mysqli_real_escape_string($connect, $_POST['fun_email']);
$fun_celular = mysqli_real_escape_string($connect, $_POST['fun_celular']);
$fun_funcao = mysqli_real_escape_string($connect, $_POST['fun_funcao']);
$fun_modelo_contrato = mysqli_real_escape_string($connect, $_POST['fun_modelo_contrato']);
$fun_cep = mysqli_real_escape_string($connect, $_POST['fun_cep']);
$fun_rua = mysqli_real_escape_string($connect, $_POST['fun_rua']);
$fun_bairro = mysqli_real_escape_string($connect, $_POST['fun_bairro']);
$fun_cidade = mysqli_real_escape_string($connect, $_POST['fun_cidade']);
$fun_estado = mysqli_real_escape_string($connect, $_POST['fun_estado']);
$fun_numero = mysqli_real_escape_string($connect, $_POST['fun_numero']);
$fun_complemento = mysqli_real_escape_string($connect, $_POST['fun_complemento']);
$fun_senha = mysqli_real_escape_string($connect, $_POST['fun_senha']);
$fun_status = mysqli_real_escape_string($connect, $_POST['fun_status']);



	$cadastro_clientepf = "UPDATE funcionarios SET fun_nome_completo = '$fun_Nome',
	fun_cpf = '$fun_cpf',
    fun_rg = '$fun_rg',	
	fun_email = '$fun_email',
    fun_celular = '$fun_celular',
	fun_funcao = '$fun_funcao',
    fun_modelo_contrato = '$fun_modelo_contrato',
    fun_cep = '$fun_cep',
    fun_rua = '$fun_rua',
    fun_bairro = '$fun_bairro',
    fun_cidade = '$fun_cidade',
    fun_estado = '$fun_estado',
    fun_numero = '$fun_numero',
    fun_complemento = '$fun_complemento',
    fun_senha = md5('$fun_senha'),
    fun_status = '$fun_status' where idfuncionarios='$fun_id' ";

	$update_pf = mysqli_query($connect, $cadastro_clientepf);

/**
 * Area de senha do usuario
 */



 $usu_nome = mysqli_real_escape_string($connect, $fun_Nome);
 $usu_email = mysqli_real_escape_string($connect, $fun_email);
 $usu_senha = md5(mysqli_real_escape_string($connect, $_POST['fun_senha']));
 $usu_token = md5(mysqli_real_escape_string($connect, $fun_email));
 $usu_status = "Ativo";
 $usu_nivel_usuario = "Equipe";
 
 $cadastro_acesso = "UPDATE usuarios SET usu_foto_login = '$fun_foto_funcionario',
     usu_nome = '$usu_nome',
     usu_email = '$usu_email',
     usu_senha = '$usu_senha',
     usu_token = '$usu_token',
     usu_status = '$fun_status',
     usu_celular = '$fun_celular',
     usu_nivel_usuario = 'Equipe' where usu_email = '$usu_email'";
 $cadastrando_acesso =  mysqli_query($connect, $cadastro_acesso);

	if ($update_pf) {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Cadastrado com Sucesso.\");
				</script>
			";*/

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-succes bg-success text-center' role='alert' style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>Informações  cadastradas com sucesso!<div>";



		header('Location: ../../colaboradores.php?sucesso');
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

