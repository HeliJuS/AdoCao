<?php   
    function inserir(){
       include_once '../Util/conexao.php';
       
       try{
       
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $idade = $_POST['idade'];
        $descricao = $_POST['sobre'];

        if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){

            $imagem = "../img/".$_FILES['imagem']["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
        }

            $cad=$conn->prepare("insert into dados (nomePet, imagemPet, tipoPet, idadePet, descricao) values (?,'$imagem',?,?,?)");
            $cad->bindParam(1, $nome);
            $cad->bindParam(2, $tipo);
            $cad->bindParam(3, $idade);
            $cad->bindParam(4, $descricao);
            $cad->execute();
            
            echo "<script>alert('Registro realizado');</script>";
        }catch(PDOException $e){
            echo "Erro agendaDAO " . $e;
        }  

    } 

    function consultar(){
            
        include_once '../Util/conexao.php';
            
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }else {
            echo('ID inválido.');
        }
            
        try {
            $list=$conn->query("select * from dados where ID = $id");
            $list->execute();
            #echo "Número de registros retornados: ".$list->rowCount()."<br> <br>";
            while($registro = $list->fetch(PDO::FETCH_OBJ)){
                echo "ID:   " . $registro->ID ."<br>";
                echo "Nome do PET:   " . $registro->nomePet . "<br>";
                echo "Tipo do PET:   " . $registro->tipoPet . "<br>";
                echo "Idade do PET:   " . $registro->idadePet . "<br>";
                echo "Descrição:   " . $registro->descricao . "<br>";
            }
        }catch(Exception $e){
            echo "Erro agendaDAO " . $e;
        }
    }

    function atualizarDeletar(){

        include_once '../Util/conexao.php';
        try {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                $id = $_GET['ID'];
        
                if ($action == "edit") {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nome = $_POST['nome'];
                        $tipo = $_POST['tipo'];
                        $idade = $_POST['idade'];
                        $descricao = $_POST['sobre'];

                        if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){

                            $imagem = "../img/".$_FILES['imagem']["name"];
                            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
                
                        }else{
                            $imagem = '';
                        }

                            $altera=$conn->prepare("update dados set nomePet=?, imagemPet=?, tipoPet=?, idadePet=?, descricao=? where id =?");
                            $altera->bindParam(1, $nome);
                            $altera->bindParam(2, $imagem);
                            $altera->bindParam(3, $tipo);
                            $altera->bindParam(4, $idade);
                            $altera->bindParam(5, $descricao);
                            $altera->bindParam(6, $id);
                            $altera->execute();

                            echo "<script>alert('Registro $id alterado com sucesso');</script>";
                    }else {
                        $alt=$conn->prepare("select * from dados where id =?");
                        $alt->bindParam(1, $id);
                        $alt->execute();
                        $registro = $alt->fetch(PDO::FETCH_ASSOC);

                        if(!empty($_FILES["imagem"])){

                            $imagem = "../img/".$_FILES['imagem']["name"];
                            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
                
                        }else{
                            $imagem = '';
                        }

                        echo "<form method='post' enctype='multipart/form-data'>";
                        echo "Nome: <input type='text' name='nome' value='".$registro["nomePet"]."'><br>";
                        echo "Tipo: <input type='text' name='tipo' value='".$registro["tipoPet"]."'><br>";
                        echo "Idade: <input type='text' name='idade' value='".$registro["idadePet"]."'><br>";
                        echo "Descrição: <input type='text' name='sobre' value='".$registro["descricao"]."'><br>";
                        echo "<div class='alterarImagem'>";
                        echo "<label for='imagem'>Adicionar Imagem</label>";
                        echo "</div>";  
                        echo "<input type='file' name='imagem' value='".$registro["imagemPet"]."'><br>";
                        echo "<input type='submit' value='Salvar'>";
                        echo "</form>";

                        echo "<img src='".$registro["imagemPet"]. "' width='150' height='90'><br>";
                    }
    
                }elseif($action == "delete"){
                    $exc=$conn->prepare("delete from dados where id = ?");
                    $exc->bindParam(1, $id);
                    $exc->execute();   
                    echo "<script>alert('Registro $id apagado com sucesso');</script>";
                }
        }
        }catch(Exception $e){
            echo "Erro adocaoDAO " . $e;
        }
        
         $list=$conn->query("select * from dados");
         $list->execute();
         
        echo "<table>";
           echo "<tr>";
                echo "<th>Imagem</th>";
                echo "<th>Descrição</th>";
                echo "<th>Atualizar</th>";
                echo "<th>Editar</th>";
            echo "</tr>";
         
            while($registro = $list->fetch(PDO::FETCH_ASSOC)){
             
                if (is_array($registro)) {
                    echo "<tr>";
                        echo "<td>" ."<img src='".$registro["imagemPet"]. "' width='150' 'height='90'<br>"."</td>";
                        echo "<td>".$registro["nomePet"] . "<br>".$registro["tipoPet"] . "<br>".$registro["idadePet"] ."<br>".$registro["descricao"] ."</td>";
                        echo "<td> " ."<a href='?action=edit&ID=".$registro["id"]."' class='editar'>Editar</a>" ."</td>";
                        echo "<td> " ."<a href='?action=delete&ID=".$registro["id"]."' class='excluir'>Excluir</a>" ."</td>";
                    echo" </tr>";
                }else{
                    echo "Houve um erro aí hein! :(";
                }
            }
        echo "</table>";
    }
    function exibirPet(){

        include_once '../Util/conexao.php';

        $list=$conn->query("select * from dados");
        $list->execute();
    
            echo "<table>";
                echo "<tr>";
                    echo "<th>PET</th>";
                    echo "<th>Descrição</th>";
                echo "</tr>";
                
                while($registro = $list->fetch(PDO::FETCH_ASSOC)){
                    
                    if (is_array($registro)) {
                        echo "<tr>";
                            echo "<td>" ."<img src='".$registro["imagemPet"]. "' width='150' height='90'<br>" ."</td>". "<br>";
                            echo "<td>" .$registro["nomePet"] . "<br>".$registro["tipoPet"] . "<br>".$registro["idadePet"] ."<br>".$registro["descricao"] ."</td>";
                        echo" </tr>";
                        echo "<br>";
                    }else{
                        echo "Houve um erro aí hein! :(";
                    }
                }
            echo "</table>";
}
?>