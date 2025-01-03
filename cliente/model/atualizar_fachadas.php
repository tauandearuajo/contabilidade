<?php

session_start();
require_once 'database/conexao.php';


$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);
var_dump($report_id);

if($_FILES['front_of_site']['name'] != null && $_FILES['gate']['name'] != null &&
$_FILES['external_sides1']['name'] != null &&  $_FILES['external_sides2']['name'] != null && $_FILES['external_sides3']['name'] != null && $_FILES['external_sides4']['name'] != null && 
$_FILES['right_side_internal']['name'] != null && $_FILES['internal_site_background']['name'] != null && $_FILES['left_side_internal']['name'] != null && $_FILES['internal_site_backgrounds']['name'] != null
&& $_FILES['extra1']['name'] != null && $_FILES['extra2']['name'] != null){

$front_of_site = $_FILES['front_of_site']['name'];
	$gate = $_FILES['gate']['name'];
	$external_sides1 = $_FILES['external_sides1']['name'];
	$external_sides2 = $_FILES['external_sides2']['name'];
	$external_sides3 = $_FILES['external_sides3']['name'];
	$external_sides4 = $_FILES['external_sides4']['name'];
	$right_side_internal = $_FILES['right_side_internal']['name'];
	$internal_site_background = $_FILES['internal_site_background']['name'];
	$left_side_internal = $_FILES['left_side_internal']['name'];
	$internal_site_backgrounds = $_FILES['internal_site_backgrounds']['name'];
	$extra1 = $_FILES['extra1']['name'];
	$extra2 = $_FILES['extra2']['name'];
	


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['front_of_site']['tmp_name'], "../uploads/" . $front_of_site);
	move_uploaded_file($_FILES['gate']['tmp_name'], "../uploads/" . $gate);
	move_uploaded_file($_FILES['external_sides1']['tmp_name'], "../uploads/" . $external_sides1);
	move_uploaded_file($_FILES['external_sides2']['tmp_name'], "../uploads/" . $external_sides2);
	move_uploaded_file($_FILES['external_sides3']['tmp_name'], "../uploads/" . $external_sides3);
	move_uploaded_file($_FILES['external_sides4']['tmp_name'], "../uploads/" . $external_sides4);
	move_uploaded_file($_FILES['right_side_internal']['tmp_name'], "../uploads/" . $right_side_internal);
	move_uploaded_file($_FILES['internal_site_background']['tmp_name'], "../uploads/" . $internal_site_background);
	move_uploaded_file($_FILES['left_side_internal']['tmp_name'], "../uploads/" . $left_side_internal);
	move_uploaded_file($_FILES['internal_site_backgrounds']['tmp_name'], "../uploads/" . $internal_site_backgrounds);
	move_uploaded_file($_FILES['extra1']['tmp_name'], "../uploads/" . $extra1);
	move_uploaded_file($_FILES['extra2']['tmp_name'], "../uploads/" . $extra2);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}


else if($_FILES['front_of_site']['name'] != null || $_FILES['front_of_site']['name'] != ""){
	

	$front_of_site = $_FILES['front_of_site']['name'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['front_of_site']['tmp_name'], "../uploads/" . $front_of_site);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['gate']['name'] != null || $_FILES['gate']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_FILES['gate']['name'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['gate']['tmp_name'], "../uploads/" . $gate);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['external_sides1']['name'] != null || $_FILES['external_sides1']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_FILES['external_sides1']['name'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['external_sides1']['tmp_name'], "../uploads/" . $external_sides1);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['external_sides2']['name'] != null || $_FILES['external_sides2']['name'] != ""){

	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_FILES['external_sides2']['name'];
	$external_sides3 = $_POST['external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['external_sides2']['tmp_name'], "../uploads/" . $external_sides2);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['external_sides3']['name'] != null || $_FILES['external_sides3']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_FILES['external_sides3']['name'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['external_sides3']['tmp_name'], "../uploads/" . $external_sides3);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['external_sides4']['name'] != null || $_FILES['external_sides4']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['$external_sides3'];
	$external_sides4 = $_FILES['external_sides4']['name'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['external_sides4']['tmp_name'], "../uploads/" . $external_sides4);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['right_side_internal']['name'] != null || $_FILES['right_side_internal']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['$external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_FILES['right_side_internal']['name'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['right_side_internal']['tmp_name'], "../uploads/" . $external_sides4);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['internal_site_background']['name'] != null || $_FILES['internal_site_background']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['$external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_FILES['internal_site_background']['name'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['internal_site_background']['tmp_name'], "../uploads/" . $external_sides4);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['left_side_internal']['name'] != null || $_FILES['left_side_internal']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['$external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_FILES['left_side_internal']['name'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['left_side_internal']['tmp_name'], "../uploads/" . $external_sides4);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['internal_site_backgrounds']['name'] != null || $_FILES['internal_site_backgrounds']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['$external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_FILES['internal_site_backgrounds']['name'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_POST['extra2'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['internal_site_backgrounds']['tmp_name'], "../uploads/" . $external_sides4);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['extra1']['name'] != null || $_FILES['internal_site_backgrounds']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['$external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_FILES['extra1']['name'];
	$extra2 = $_POST['extra2'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['extra1']['tmp_name'], "../uploads/" . $external_sides4);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}
else if($_FILES['extra2']['name'] != null || $_FILES['extra2']['name'] != ""){
	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['$external_sides3'];
	$external_sides4 = $_POST['external_sides4'];
	$right_side_internal = $_POST['right_side_internal'];
	$internal_site_background = $_POST['internal_site_background'];
	$left_side_internal = $_POST['left_side_internal'];
	$internal_site_backgrounds = $_POST['internal_site_backgrounds'];
	$extra1 = $_POST['extra1'];
	$extra2 = $_FILES['extra2']['name'];

	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['extra2']['tmp_name'], "../uploads/" . $external_sides4);
	
	
	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
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

	$front_of_site = $_POST['front_of_site'];
	$gate = $_POST['gate'];
	$external_sides1 = $_POST['external_sides1'];
	$external_sides2 = $_POST['external_sides2'];
	$external_sides3 = $_POST['external_sides3'];
	$external_sides4 = $_POST['external_sides4'];

	$update_fachadas = "UPDATE facades_and_sides SET front_of_site = '$front_of_site',
	gate = '$gate',
	external_sides1 = '$external_sides1', 
	external_sides2 = '$external_sides2',
	external_sides3 = '$external_sides3',
	external_sides4 = '$external_sides4',
	right_side_internal = '$right_side_internal',
	internal_site_background = '$internal_site_background',
	left_side_internal = '$left_side_internal',
	internal_site_backgrounds = '$internal_site_backgrounds',
	extra1 = '$extra1',
	extra2 = '$extra2',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_fachadas);



	if ($up_viaacesso) {
		

		
		$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa três<br>
		do relatório, informaçoes da via de acesso, preencha abaixo!</div>" ;
		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
	} else {
		

		$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

		//header('Location: ../lista_clientes.php?erro');

		echo mysqli_error($connect);
	}

}