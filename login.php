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
     <link rel="stylesheet" href="styles2.css" type="text/css"/>
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Página de Login</title>
</head>

<body>
<a class="link4" href="dashboard.php">Voltar</a>
    <h1>Faça Login</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//verificando se o campo n está vazio e a realizando a consulta com sql no bd pelo usuário e a senha
    if (!empty($dados['SendLogin'])) {
        $query_usuario = "SELECT id, nome, usuario, senha_usuario 
                        FROM usuarios 
                        WHERE usuario = :usuario AND senha_usuario = :senha_usuario 
                        LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
        $result_usuario->bindParam(':senha_usuario', $dados['senha_usuario'], PDO::PARAM_STR);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            //realizando login ou exibindo msg de erro
            if ($result_usuario->rowCount()){
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                header("Location: dashboard.php");
            }else{
                $_SESSION['msg'] = "<div class='erro'>Erro: Usuário ou senha inválida!</div>";
            }
        }else{
            $_SESSION['msg'] = "<div class='erro'>Erro: Usuário ou senha inválida!</div>";
        }

        
    }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

   <div class="form-center"><form method="POST" action="">
        <label class="text">Email:</label>
        <input class="campo" type="text" name="usuario" placeholder="Digite o seu email" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>"><br>

        <label class="text">Senha:</label>
        <input class="campo" type="password" name="senha_usuario" placeholder="Digite a senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>"><br>
<a class="link2" href="#">Esqueceu sua Senha?</a>
<br>
        <input class="botao" type="submit" value="Entrar" name="SendLogin">
    </form></div>

    <br>
    <a class="link3" href="cadastro.php">Não Tem Conta? Cadastre-se Já!</a>
</body>

</html>