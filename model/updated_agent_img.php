<?php

session_start();
require_once 'database/conexao.php';



$id_cliente = mysqli_real_escape_string($connect, $_POST['id_cliente']);

if (isset($_FILES['img_cliente'])) {
	$arquivo = $_FILES['img_cliente']['name'];
	$extensao = strtolower(substr($_FILES['img_cliente']['name'], -4));

	$novo_nome = uniqid();
	$novo_arquivo = $novo_nome.$extensao;

	$diretorio = "uploads/";
    $foto_do_cliente = $diretorio.$novo_arquivo;
	move_uploaded_file($_FILES['img_cliente']['tmp_name'], "../uploads/" . $novo_arquivo);


	$cadastro_clientepf = "UPDATE clients SET photo='$foto_do_cliente' where id='$id_cliente' ";

	$atualizar_pf = mysqli_query($connect, $cadastro_clientepf);


	if ($atualizar_pf) {

			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Cliente $name, Teve sua imagem atualizada com sucesso</div>";


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

}