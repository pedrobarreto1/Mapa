<?php
session_start();
ob_start();
//saindo e exibindo msg na pagina de login
unset($_SESSION['id'], $_SESSION['nome']);
$_SESSION['msg'] = "<div class='suc'>Deslogado com sucesso!</div>";

header("Location: login.php");