<?php
include ('config.php');
session_start(); // inicia a sessao	

if (@$_REQUEST['botao']=="Entrar")
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);
	while ($coluna=mysqli_fetch_array($result)) 
	{
		
		$_SESSION["id_usuario"]= $coluna["id"]; 
		$_SESSION["nome_usuario"] = $coluna["login"]; 
		header("Location: menu.php"); 
		exit; 

	}
	
}


?>

<html>
<body>
<form action=# method=post>

Login: <input type=text name=login>
Senha: <input type=text name=senha>
<input type=submit name=botao value=Entrar>

</form>










