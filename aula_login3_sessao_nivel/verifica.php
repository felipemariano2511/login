<?php 
// Inicia sessões 
session_abort();
session_start(); 

// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]) || !isset($_SESSION["nivel"])) 
{ 
    // Usuário não logado! Redireciona para a página de login 
    header("Location: login.php"); 
    exit; 
} 
?>
