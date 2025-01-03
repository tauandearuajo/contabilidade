<?php

session_start();
require_once 'database/conexao.php';


$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);
//var_dump($report_id);

if($_FILES['gps']['name'] != null && $_FILES['site_facade']['name'] != null &&
$_FILES['1st_street_access']['name'] != null &&  $_FILES['2st_street_access']['name'] != null && $_FILES['identification_plate_ev']['name'] != null && $_FILES['identification_plate_sba']['name'] != null){

$gps = $_FILES['gps']['name'];
	$site_facade = $_FILES['site_facade']['name'];
	$one_st_street_access = $_FILES['1st_street_access']['name'];
	$two_st_street_access = $_FILES['2st_street_access']['name'];
	$identification_plate_ev = $_FILES['identification_plate_ev']['name'];
	$identification_plate_sba = $_FILES['identification_plate_sba']['name'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['gps']['tmp_name'], "../uploads/" . $gps);
	move_uploaded_file($_FILES['site_facade']['tmp_name'], "../uploads/" . $site_facade);
	move_uploaded_file($_FILES['1st_street_access']['tmp_name'], "../uploads/" . $one_st_street_access);
	move_uploaded_file($_FILES['2st_street_access']['tmp_name'], "../uploads/" . $two_st_street_access);
	move_uploaded_file($_FILES['identification_plate_ev']['tmp_name'], "../uploads/" . $identification_plate_ev);
	move_uploaded_file($_FILES['identification_plate_sba']['tmp_name'], "../uploads/" . $identification_plate_sba);
	
	
	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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


else if($_FILES['gps']['name'] != null || $_FILES['gps']['name'] != ""){
	$gps = $_FILES['gps']['name'];
	$site_facade = $_POST['site_facade'];
	$one_st_street_access = $_POST['1st_street_access'];
	$two_st_street_access = $_POST['2st_street_access'];
	$identification_plate_ev = $_POST['identification_plate_ev'];
	$identification_plate_sba = $_POST['identification_plate_sba'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['gps']['tmp_name'], "../uploads/" . $gps);
	
	
	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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
else if($_FILES['site_facade']['name'] != null || $_FILES['site_facade']['name'] != ""){
	$gps = $_POST['gps'];
	$site_facade = $_FILES['site_facade']['name'];
	$one_st_street_access = $_POST['1st_street_access'];
	$two_st_street_access = $_POST['2st_street_access'];
	$identification_plate_ev = $_POST['identification_plate_ev'];
	$identification_plate_sba = $_POST['identification_plate_sba'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['site_facade']['tmp_name'], "../uploads/" . $site_facade);
	
	
	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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
else if($_FILES['1st_street_access']['name'] != null || $_FILES['1st_street_access']['name'] != ""){
	$gps = $_POST['gps'];
	$site_facade = $_POST['site_facade'];
	$one_st_street_access = $_FILES['1st_street_access']['name'];
	$two_st_street_access = $_POST['2st_street_access'];
	$identification_plate_ev = $_POST['identification_plate_ev'];
	$identification_plate_sba = $_POST['identification_plate_sba'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['1st_street_access']['tmp_name'], "../uploads/" . $one_st_street_access);
	
	
	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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
else if($_FILES['2st_street_access']['name'] != null || $_FILES['2st_street_access']['name'] != ""){
	$gps = $_POST['gps'];
	$site_facade = $_POST['site_facade'];
	$one_st_street_access = $_POST['1st_street_access'];
	$two_st_street_access = $_FILES['2st_street_access']['name'];
	$identification_plate_ev = $_POST['identification_plate_ev'];
	$identification_plate_sba = $_POST['identification_plate_sba'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['2st_street_access']['tmp_name'], "../uploads/" . $two_st_street_access);
	
	
	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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
else if($_FILES['identification_plate_ev']['name'] != null || $_FILES['identification_plate_ev']['name'] != ""){
	$gps = $_POST['gps'];
	$site_facade = $_POST['site_facade'];
	$one_st_street_access = $_POST['1st_street_access'];
	$two_st_street_access = $_POST['2st_street_access'];
	$identification_plate_ev = $_FILES['identification_plate_ev']['name'];
	$identification_plate_sba = $_POST['identification_plate_sba'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['identification_plate_ev']['tmp_name'], "../uploads/" . $identification_plate_ev);
	
	
	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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
else if($_FILES['identification_plate_sba']['name'] != null || $_FILES['identification_plate_sba']['name'] != ""){
	$gps = $_POST['gps'];
	$site_facade = $_POST['site_facade'];
	$one_st_street_access = $_POST['1st_street_access'];
	$two_st_street_access = $_POST['2st_street_access'];
	$identification_plate_ev = $_POST['$identification_plate_ev'];
	$identification_plate_sba = $_FILES['identification_plate_sba']['name'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['identification_plate_sba']['tmp_name'], "../uploads/" . $identification_plate_sba);
	
	
	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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

	$gps = $_POST['gps'];
	$site_facade = $_POST['site_facade'];
	$one_st_street_access = $_POST['1st_street_access'];
	$two_st_street_access = $_POST['2st_street_access'];
	$identification_plate_ev = $_POST['identification_plate_ev'];
	$identification_plate_sba = $_POST['identification_plate_sba'];

	$update_via = "UPDATE access_way SET gps = '$gps',
	site_facade = '$site_facade',
	1st_street_access = '$one_st_street_access', 
	2st_street_access = '$two_st_street_access',
	identification_plate_ev = '$identification_plate_ev',
	identification_plate_sba = '$identification_plate_sba',
	updated_at = now() where report_id='$report_id'";

	$up_viaacesso = mysqli_query($connect, $update_via);



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