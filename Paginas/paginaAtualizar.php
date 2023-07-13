<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
    <title>Adotar</title>
</head>
<body>
    <nav class="menu">
    <img width="64" height="64" src="https://img.icons8.com/cotton/64/dog-footprint.png" alt="dog-footprint"/>
    <div class="headerBtnGroup">
      <a href="paginaDoador.php" class="botao">Meu Perfil</a>
      <a href="paginaCadastrar.php" class="botao">Cadastrar PET</a>
      <a href="paginaAtualizar.php" class="botao">Atualizar PET</a>
      <a href="paginaDoacao.php" class="botao">PETs</a>
    </div>
    </nav>
    <?php
        include_once '../DAO/adocaoDAO.php';
        atualizarDeletar(); 
        session_start();
        if(!isset($_SESSION ["nomeDoador"])) {
            header('Location:./paginaLogin.php');
        }  
    ?>
</body>
</html>