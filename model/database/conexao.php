<?php 

//Conexão com banco de dados

$servername = "localhost";
//$username = "u904795861_sic";
$username = "root";
$password = "Projeto@228638";
$db_name = "contabilidade";
//$db_name = "u904795861_sic";


$connect = mysqli_connect($servername, $username, $password, $db_name);
if($connect != true){
    $servername = "localhost";
//$username = "u904795861_sic";
$username = "root";
$password = "Projeto@228638";
$db_name = "contabilidade";
}
else if(mysqli_connect_error()){
    echo "Falha na conexão" .mysqli_connect_error();
}