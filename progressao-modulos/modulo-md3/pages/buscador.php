<?php

    // traz as configurações de comeão com banco de dados    
    require_once "../modules/conexao.php";
    include_once "../modules/crud.php";

    $filtros = array();
    $data = array();


    if (isset($_GET["codigo"]) && !empty($_GET["codigo"]) ){
        $filtros['codigo'] = $_GET["codigo"];
        
        $data = selecionar("produtos", null, $filtros, null);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Busca Rápida de Produto</h2>

    <form action="#" method="get">

        <input type="text" name="codigo" id="codigo" minlength="7" maxlength="15" required placeholder="Digite o código do produto">

        
        <button type="submit" title="Buscar">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 24 24"><path fill="black" d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0c.41-.41.41-1.08 0-1.49zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg>
        </button>
        <!-- <input type="submit" value="Buscar"> -->
    </form>

    <table border="2">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Codigo</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ativo</th>
                <th>Cadastrado em</th>
            </tr>
        </thead>

        <tbody>
            <?php if (count($data) != 0 ): ?>
                
                <?php foreach($data as $key=>$linha):?>
                    <?php $cor = ($linha["ativo"] == 0 ) ? "color: red;  font-weight: bolder;" : ""; ?>
                    <tr style="<?=$cor;?><">
                        <td> <?= $linha["nome"] ?> </td>
                        <td> <?= $linha["codigo"] ?> </td>
                        <td> <?= $linha["preco"] ?> </td>
                        <td> <?= $linha["estoque"] ?> </td>
                        <td> <?= $linha["ativo"] ? "Disponível" : "Indisponível" ?> </td>
                        <td> <?= $linha["cadastradoEm"] ?> </td>
                        
                    </tr>
                <?php endforeach;?>
            <?php endif; ?>

            <?php if (count($data) == 0): ?>
                <tr>
                    <td colspan="6" style="height: 50px;">
                        Produto não encontrado!
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>

    <?php if (isset($_GET["msg"])):?>
        <?php
            switch ($_GET["msg"]){

                case "delete-ok":
                    echo "<script> alert(' Item deletado com sucesso! ') </script>";
                    break;
                
                case "delete-erro":
                    echo "<script> alert('Não foi possível deletar esse item! ') </script>";
                    break;
                
                case "restauration-ok":
                    echo "<script> alert('Item restaurado com sucesso! ') </script>";
                    break;
                
                case "proibido":
                    echo "<script> alert(' [ERRO] - Acesso Negado! ') </script>";
                    break;
            }    
        ?>
    <?php endif;?>
    
</body>
</html>