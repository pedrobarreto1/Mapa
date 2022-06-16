<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#A7C957" />
     <link rel="stylesheet" href="styles2.css" type="text/css"/>
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Página de Cadastro</title>
</head>

<body>
    <a class="link4" href="dashboard.php">Voltar</a>
    <h1>Faça seu cadastro!</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $texto ="";
    //verificando se usuário (email) já existe no bd
    if (!empty($dados['SendCad'])) {
    $empty_input = false;
    $query_usuario = "SELECT usuario
                        FROM usuarios 
                        WHERE usuario =:usuario  
                        LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
    $result_usuario->execute();
    //verificando se os campos estão vazios
     if (in_array("", $dados)) {
                $empty_input = true;
                echo "<div class='erro'>Erro: Necessário preencher todos campos!</div>";
            } 
    //exibindo msg caso o email já exista
    if($result_usuario->rowCount() >= 0 && (filter_var($dados['usuario'], FILTER_VALIDATE_EMAIL)) && strlen($dados['senha_usuario'])>=6){
$texto = "<div class='erro'>Usuário já existe!</div>";}
//verificando se o email é válido 
    if (!filter_var($dados['usuario'], FILTER_VALIDATE_EMAIL) && !$empty_input){
    $empty_input = true;
    $texto = "<div class='erro'>Email Inválido</div>";}
   //exibindo msg caso a senha seja menor q 6 caracteres
   if (strlen($dados['senha_usuario']) < 6 && !$empty_input){
    echo "<div class='erro'>senha deve ter pelo menos 6 caracteres</div>";}
    
   
      //realizando cadastro caso os campos n estejam vazios, o email seja válido, a senha tenha mais de 6 caracteres e o email ainda n exista no bd
         if (!$empty_input && ($result_usuario->rowCount() <= 0) && (filter_var($dados['usuario'], FILTER_VALIDATE_EMAIL)) && strlen($dados['senha_usuario']) >= 6){
        $query_cad = "INSERT INTO usuarios (nome, usuario, senha_usuario) VALUES (:nome, :usuario, :senha_usuario) ";
        $result_cad = $conn->prepare($query_cad);
        $result_cad->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
       $result_cad->bindParam(':nome', $dados['nome'], PDO::PARAM_STR); $result_cad->bindParam(':senha_usuario', $dados['senha_usuario'], PDO::PARAM_STR);
        $result_cad->execute();

    

        if(($result_cad) AND ($result_cad->rowCount() != 0)){
            $row_cad = $result_cad->fetch(PDO::FETCH_ASSOC);
         
            }
            
            
//exibindo msg de sucesso ou erro caso o cadastro exista problema na conexão com o bd
                
                if ($result_cad->rowCount()) {
                    $texto = "<div class='suc'>Usuário cadastrado com sucesso! <a class='link' href='login.php'>Fazer login</a></div>";
                    unset($dados);
                } else {
                    echo "<div class='erro'>Erro: Usuário não cadastrado com sucesso!</div>";
                }
            }
            echo $texto;
            
    }
    ?>
   <div class="form-center"> <form method="POST" action="">
    <label class="text">Nome:</label><br>
        <input class="campo" type="text" name="nome" placeholder="Nome" value="<?php if(isset($dados['nome'])){ echo $dados['nome']; } ?>"><br>
        <label class="text">Email:</label><br>
        <input class ="campo" type="text" name="usuario" placeholder="Digite o usuário" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>"><br>

        <label class="text">Senha:</label><br>
        <input class="campo" type="password" name="senha_usuario" placeholder="Digite a senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>"><br>

        <input class="botao" type="submit" value="Cadastrar" name="SendCad">
    </form></div>
<br>
    <a class="link3" href="login.php">Já Tem Conta? Faça Login!</a>
    <br><br>
</body>

</html>