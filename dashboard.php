<?php
session_start();
ob_start();
include_once 'conexao.php';
//verificando se o usuário está logado, caso n redireciona para a página home
if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
     <link rel="stylesheet" href="styles2.css" type="text/css"/>
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Dashboard</title>
</head>

<body>
    <h1>Bem vindo <?php echo $_SESSION['nome']; ?>!</h1>
    <div class="espaco"><br></div>
<div class="block"><a class="item1" href="mapa.html">Mapa</a>
   <a class="item2" href="#">Cadastrar Local</a></div>
   <div class="block"><a class="item3" href="#">Cadastrar Rota</a><a class="item4" href="#">Cadastrar Evento</a></div>
<br>

    <a class="link" href="sair.php">Sair</a>

</body>

</html>