<?php

session_start();
require_once 'database/conexao.php';


$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);
//var_dump($report_id);
if($_FILES['padlock_password']['name'] != null && $_FILES['photo_padlock']['name'] != null &&
$_FILES['photo_gate']['name'] != null &&  $_FILES['anti_rust']['name'] != null && $_FILES['gate_latch']['name'] != null){

$padlock_password = $_FILES['padlock_password']['name'];
	$photo_padlock = $_FILES['photo_padlock']['name'];
	$photo_gate = $_FILES['photo_gate']['name'];
	$anti_rust = $_FILES['anti_rust']['name'];
	$gate_latch = $_FILES['gate_latch']['name'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['padlock_password']['tmp_name'], "../uploads/" . $padlock_password);
	move_uploaded_file($_FILES['photo_padlock']['tmp_name'], "../uploads/" . $photo_padlock);
	move_uploaded_file($_FILES['photo_gate']['tmp_name'], "../uploads/" . $photo_gate);
	move_uploaded_file($_FILES['anti_rust']['tmp_name'], "../uploads/" . $anti_rust);
	move_uploaded_file($_FILES['gate_latch']['tmp_name'], "../uploads/" . $gate_latch);
	
	
	$update_cadeado = "UPDATE padlock SET padlock_password = '$padlock_password',
	photo_padlock = '$photo_padlock',
	photo_gate = '$photo_gate', 
	anti_rust = '$anti_rust',
	gate_latch = '$gate_latch',
	updated_at = now() where report_id='$report_id'";

	$up_cadeado = mysqli_query($connect, $update_cadeado);



	if ($cad_pf) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['padlock_password']['name'] != null || $_FILES['padlock_password']['name'] != ""){
	$padlock_password = $_FILES['padlock_password']['name'];
	$photo_padlock = $_POST['photo_padlock'];
	$photo_gate = $_POST['photo_gate'];
	$anti_rust = $_POST['anti_rust'];
	$gate_latch = $_POST['gate_latch'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['padlock_password']['tmp_name'], "../uploads/" . $padlock_password);
	
	
	$update_cadeado = "UPDATE padlock SET padlock_password = '$padlock_password',
	photo_padlock = '$photo_padlock',
	photo_gate = '$photo_gate', 
	anti_rust = '$anti_rust',
	gate_latch = '$gate_latch',
	updated_at = now() where report_id='$report_id'";

	$up_cadeado = mysqli_query($connect, $update_cadeado);



	if ($up_cadeado) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['photo_padlock']['name'] != null || $_FILES['padlock_password']['name'] != ""){
	$padlock_password = $_POST['padlock_password'];
	$photo_padlock = $_FILES['photo_padlock']['name'];
	$photo_gate = $_POST['photo_gate'];
	$anti_rust = $_POST['anti_rust'];
	$gate_latch = $_POST['gate_latch'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['photo_padlock']['tmp_name'], "../uploads/" . $photo_padlock);
	
	
	$update_cadeado = "UPDATE padlock SET padlock_password = '$padlock_password',
	photo_padlock = '$photo_padlock',
	photo_gate = '$photo_gate', 
	anti_rust = '$anti_rust',
	gate_latch = '$gate_latch',
	updated_at = now() where report_id='$report_id'";

	$up_cadeado = mysqli_query($connect, $update_cadeado);



	if ($up_cadeado) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['photo_gate']['name'] != null || $_FILES['photo_gate']['name'] != ""){
	$padlock_password = $_POST['padlock_password'];
	$photo_padlock = $_POST['photo_padlock'];
	$photo_gate = $_FILES['photo_gate']['name'];
	$anti_rust = $_POST['anti_rust'];
	$gate_latch = $_POST['gate_latch'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['photo_gate']['tmp_name'], "../uploads/" . $photo_gate);
	
	
	$update_cadeado = "UPDATE padlock SET padlock_password = '$padlock_password',
	photo_padlock = '$photo_padlock',
	photo_gate = '$photo_gate', 
	anti_rust = '$anti_rust',
	gate_latch = '$gate_latch',
	updated_at = now() where report_id='$report_id'";

	$up_cadeado = mysqli_query($connect, $update_cadeado);



	if ($up_cadeado) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['anti_rust']['name'] != null || $_FILES['anti_rust']['name'] != ""){
	$padlock_password = $_POST['padlock_password'];
	$photo_padlock = $_POST['photo_padlock'];
	$photo_gate = $_POST['photo_gate'];
	$anti_rust = $_FILES['anti_rust']['name'];
	$gate_latch = $_POST['gate_latch'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['anti_rust']['tmp_name'], "../uploads/" . $anti_rust);
	
	
	$update_cadeado = "UPDATE padlock SET padlock_password = '$padlock_password',
	photo_padlock = '$photo_padlock',
	photo_gate = '$photo_gate', 
	anti_rust = '$anti_rust',
	gate_latch = '$gate_latch',
	updated_at = now() where report_id='$report_id'";

	$up_cadeado = mysqli_query($connect, $update_cadeado);



	if ($up_cadeado) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['gate_latch']['name'] != null || $_FILES['gate_latch']['name'] != ""){
	$padlock_password = $_POST['padlock_password'];
	$photo_padlock = $_POST['photo_padlock'];
	$photo_gate = $_POST['photo_gate'];
	$anti_rust = $_POST['anti_rust'];
	$gate_latch = $_FILES['gate_latch']['name'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['gate_latch']['tmp_name'], "../uploads/" . $gate_latch);
	
	
	$update_cadeado = "UPDATE padlock SET padlock_password = '$padlock_password',
	photo_padlock = '$photo_padlock',
	photo_gate = '$photo_gate', 
	anti_rust = '$anti_rust',
	gate_latch = '$gate_latch',
	updated_at = now() where report_id='$report_id'";

	$up_cadeado = mysqli_query($connect, $update_cadeado);



	if ($up_cadeado) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}


else{

	$padlock_password = $_POST['padlock_password'];
	$photo_padlock = $_POST['photo_padlock'];
	$photo_gate = $_POST['photo_gate'];
	$anti_rust = $_POST['anti_rust'];
	$gate_latch = $_POST['gate_latch'];

	$update_cadeado = "UPDATE padlock SET padlock_password = '$padlock_password',
	photo_padlock = '$photo_padlock',
	photo_gate = '$photo_gate', 
	anti_rust = '$anti_rust',
	gate_latch = '$gate_latch',
	updated_at = now() where report_id='$report_id'";

	$up_cadeado = mysqli_query($connect, $update_cadeado);



	if ($up_cadeado) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}