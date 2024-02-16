<?php

    // parte do codigo que recebe os dados do BD: nome do BD, nome d oprojeto 
    // em caso de erro, ela não roda o restante do script, mas o RIQUERE pode ser trocado pelo INCLUDE_ONCE
    require_once "conexao.php";

    include_once "crud.php";

?>


<form action="#" method="post">

    <input type="text" name="nome" id="" placeholder="nome do Produto" required> <br>
    <input type="text" name="codigo" id="" maxlength="15" placeholder="codigo do Produto" required> <br>
    <input type="text" name="preco" id="" placeholder="preco do Produto" required> <br>
    <input type="text" name="estoque" id="" placeholder="estoque do Produto" required> <br>
    <input type="hidden" name="ativo" value="1">
    <input type="hidden" name="isDeleted" value=" ">
    <input type="submit" value="Cadastrar">
    
</form>


<?php

    if (isset($_POST["nome"]) and !empty($_POST["nome"])){
            
        // variavel recebe o nome da tebela e os dados a cadastrar, e manda para o banco de dados
        $resultado = inserir("produtos", $_POST);

        
        if ($resultado){
            echo"Inserido com sucesso!";
            inserir("log", ["tipo" => "Inserção de Registro", "conteudo" => "O produto com ID: ".$_POST['codigo']." foi cadastrado pelo usuario XXXX."]);

          } else {
              echo "[ ERRO ] - Não foi possível inserir!";
              inserir("log", ["tipo" => "Inserção de Registro", "conteudo" => "O usuario XXXX tentou cadastrar o produto com ID: ".$_POST['codigo']]);
          }
    }
?>
