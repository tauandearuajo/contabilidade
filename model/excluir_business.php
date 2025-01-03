<?php

session_start();
require_once 'database/conexao.php';



$business_id = mysqli_real_escape_string($connect, $_POST['business_id']);
	$excluir_business = "DELETE FROM business where id='$business_id' ";

	$deletar_bus = mysqli_query($connect, $excluir_business);


	if ($deletar_bus) {



		header('Location: ../business.php?sucesso');
	} else {
		
		echo mysqli_error($connect);
	}

