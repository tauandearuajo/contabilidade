<?php

session_start();
require_once 'database/conexao.php';


date_default_timezone_set('America/Sao_Paulo');

$corporate_reason = mysqli_real_escape_string($connect, $_POST['corporate_reason']);
$fantasy_name = mysqli_real_escape_string($connect, $_POST['fantasy_name']);
$cnpj = mysqli_real_escape_string($connect, $_POST['cnpj']);
$created_at = date('d-m-y');



$cadastro_business = "INSERT INTO business(corporate_reason,fantasy_name,cnpj,created_at)
	values ('$corporate_reason','$fantasy_name','$cnpj','$created_at')";

$cad_bus = mysqli_query($connect, $cadastro_business);




if ($cad_bus) {
 

    header('Location: ../business.php?sucesso');
} else {
    /*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	*/

    $_SESSION['cadastradoInfobusi'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    //header('Location: ../lista_clientes.php?erro');

    echo mysqli_error($connect);
}
