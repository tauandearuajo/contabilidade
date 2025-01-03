<?php

session_start();
require_once 'database/conexao.php';
require("../vendor/autoload.php");
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");


//$restaurant_code = mysqli_real_escape_string($connect, $_POST['restaurant_code']);


date_default_timezone_set('America/Sao_Paulo');

$id_meal = mysqli_real_escape_string($connect, $_POST['id_meal']);
$name_of_the_meal = mysqli_real_escape_string($connect, $_POST['name_of_the_meal']);
$name_restaurant = mysqli_real_escape_string($connect, $_POST['name_restaurant']);
$meal_code = mysqli_real_escape_string($connect, $_POST['meal_code']);
$description = mysqli_real_escape_string($connect, $_POST['description']);
$price = mysqli_real_escape_string($connect, $_POST['price']);
$id_fun = mysqli_real_escape_string($connect, $_POST['id_fun']);
$employee_name = mysqli_real_escape_string($connect, $_POST['employee_name']);
$delivery_method = mysqli_real_escape_string($connect, $_POST['formaEntrega']);
$follow_up = mysqli_real_escape_string($connect, $_POST['acompanhamento']);
$note = mysqli_real_escape_string($connect, $_POST['observacao']);
$created_at = date('d-m-y');


$cadastro_clientepf = "INSERT INTO cart(name,employee_name,unitary_value,amount,description,name_of_the_meal,name_restaurant, 
meal_code,id_meal,delivery_method,follow_up,order_status,id_fun,note,created_at) 
	values ('$name_of_the_meal','$employee_name','$price',1,'$description','$name_of_the_meal','$name_restaurant','$meal_code', '$id_meal',
    '$delivery_method','$follow_up','Pedido recebido','$id_fun','$note','$created_at')";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);







if ($cad_pf) {
    

    $_SESSION['pedidoComida'] = "<div class='alert alert-succes bg-success text-center' role='alert' style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>O seu pedido foi realizado!<div>";
    header('Location: ../painel.php?sucesso');
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
