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

    if(!isset($_SESSION ["nomeDoador"])) {
      header('Location:./paginaLogin.php');
    }
  ?>

    <nav class="menu">
    <img width="64" height="64" src="https://img.icons8.com/cotton/64/dog-footprint.png" alt="dog-footprint"/>
    <div class="headerBtnGroup">
      <a href="paginaDoador.php" class="botao">Meu Perfil</a>
      <a href="paginaCadastrar.php" class="botao">Cadastrar PET</a>
      <a href="paginaAtualizar.php" class="botao">Atualizar PET</a>
      <a href="paginaDoacao.php" class="botao">PETs</a>
    </div>
  </nav>
  <section class="containerCadastro">
    <div class="cadastro">
      <form action="../Forms/processaFormulario.php" method="post" enctype="multipart/form-data">
        <label for="nomePet">Nome do PET: </label>
        <input type="text" id="nome" name="nome"><br>
        <label for="tipoPet">Tipo: </label>
        <input type="text" id="tipo" name="tipo"><br>
        <label for="idadePet">Idade: </label>
        <input type="text" id="idade" name="idade"><br>
        <label for="sobrePet">Descrição: </label>
        <input type="text" id="sobre" name="sobre"><br>
        <div class="enviarImagem">
          <label for="imagem">Adicionar Imagem</label>
        </div>
        <div class="btnImagem">
          <input type="file" id="imagem" name="imagem" accept="image/*"><br>
        </div>
            <input type="submit" name ="cadastro" value="Cadastrar"><br>
      </form> 
    </div>
  </section>
</body>
</html>