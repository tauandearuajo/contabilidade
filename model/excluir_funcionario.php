<?php

session_start();
require_once 'database/conexao.php';



$agent_id = mysqli_real_escape_string($connect, $_POST['agent_id']);
	$cadastro_clientepf = "DELETE FROM clients where id='$agent_id' ";

	$deletar_pf = mysqli_query($connect, $cadastro_clientepf);


	if ($deletar_pf) {



		header('Location: ../clientes.php?sucesso');
	} else {
		
		echo mysqli_error($connect);
	}

