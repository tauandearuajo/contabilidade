<?php

session_start();
require_once 'database/conexao.php';



$idcliente = mysqli_real_escape_string($connect, $_POST['cli_id']);
$name_user = mysqli_real_escape_string($connect, $_POST['cli_nameuser']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$repeat_password = mysqli_real_escape_string($connect, $_POST['repeat_password']);
$data = date("d-M-y - h:m:s");



 
 $updated_password = "UPDATE users SET password = md5('$password'), repeat_password = md5('$repeat_password')
      where id = '$idcliente'";
 $update_pf =  mysqli_query($connect, $updated_password);

 $atualizar_atividade = "INSERT INTO recent_activities(activity_done,user_id,made_by,created_at) VALUES ('A senha de acesso foi alterada!',$idcliente,'$name_user','$data')";

 $cad_atividade = mysqli_query($connect, $atualizar_atividade);

	if ($update_pf) {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Cadastrado com Sucesso.\");
				</script>
			";*/

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-succes bg-success text-center' role='alert' style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>Informações  cadastradas com sucesso!<div>";



		header('Location: ../myaccount.php?sucesso');
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

