<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>
<?php

    session_start();

    if (isset($_POST ['botaoLogar'])){
        if ($_POST['botaoLogar'] == "ENTRAR") {
            if (!empty($_POST['nomeDoador']) & !empty($_POST['senhaDoador'])) {
                if ($_POST['senhaDoador'] == $_POST['senhaDoador']) {
                        $_SESSION["usuario_esta_logado"] = true;
                        $_SESSION["nomeDoador"] = $_POST['nomeDoador'];
                        header('Location:./paginaDoacao.php');
                } else {
                    echo "<br>Senha incorreta";
                }
            }else {
                echo "<br>Você deve digitar um usuario e uma senha";
            }
        }
    }

?>

    <section class="containerLogin">
        <div class="login">
            <div>
            <img width="64" height="64" src="https://img.icons8.com/cotton/64/dog-footprint.png" alt="dog-footprint"/>
            </div>
            <form method="post">
               
                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nomeDoador" placeholder="nome do usuário"><br>
                <label for="senha">Senha: </label>
                <input type="password" id="senha" name="senhaDoador" placeholder="senha do usuário"><br>
                <input type="submit" name="botaoLogar" value="ENTRAR" ><br>
            </form>
            <br><h4>Não possui cadastro? <a href="paginaCadastrar.php">Cadastrar...</a></h4>
        </div>    
    </section>

</body>
</html>