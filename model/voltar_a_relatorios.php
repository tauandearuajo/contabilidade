<?php
require_once 'database/conexao.php';

$_GET['reportid'] = NULL;
mysqli_close($connect);
header('Location: ../relatorio.php');