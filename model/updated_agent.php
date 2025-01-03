<?php

session_start();
require_once 'database/conexao.php';


$id_cliente = mysqli_real_escape_string($connect, $_POST['id_cliente']);
$name = mysqli_real_escape_string($connect, $_POST['name']);
$cpf = mysqli_real_escape_string($connect, $_POST['cpf']);
$phone = mysqli_real_escape_string($connect, $_POST['telefone']);
$especialidade = mysqli_real_escape_string($connect, $_POST['especialidade']);
$date_of_birth = mysqli_real_escape_string($connect, $_POST['data_nascimento']);
	$cadastro_clientepf = "UPDATE clients SET name='$name',cpf='$cpf',phone='$phone',specialty='$especialidade',date_of_birth='$date_of_birth' where id='$id_cliente' ";

	$atualizar_pf = mysqli_query($connect, $cadastro_clientepf);


	if ($atualizar_pf) {

		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Cliente $name, Teve seus dados atualizados com sucesso</div>";


		header('Location: ../clientes.php?sucesso');
	} else {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	*/
		echo mysqli_error($connect);
	}

