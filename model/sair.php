<?php

	session_start();
	session_unset();
	session_destroy();

	//redirecionar o usuario para a página de login
	header('Location: https://app.aeap.org.br/admin');
	
?>