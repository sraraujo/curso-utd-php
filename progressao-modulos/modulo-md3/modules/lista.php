<?php

    // traz as configurações de comeão com banco de dados    
    require_once "conexao.php";
    
    include_once "crud.php";

    // para mostrar ativo e inativos, exceto os deletados
    // $filtros['isDeleted'] = "";
    
    // para mostrar todos
    // $filtros = null;

    $filtros["ativo"] = '1';
    $filtros['isDeleted'] = "";

    if (isset($_GET["filtro"])){
        
        switch ( $_GET["filtro"] ){

            case 1:
                // ver ativos
                $filtros['ativo'] = 1;
                $filtros['isDeleted'] = "";
                break;

            case 2:
                // ver inativo
                unset($filtros['isDeleted']);
                $filtros['ativo'] = 0;
                break;
            
            case 3:
                // ver todos
                $filtros = null;
                break;
            
            case 4:
                // ver deletados
                unset($filtros['ativo']);
                $filtros['isDeleted'] = "*";
                break;
        }
    }

    $data = selecionar("produtos", null, $filtros, null);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <hr> Opções de Visualização: 
        <a href="?filtro=1">Ver Ativos</a> | 
        <a href="?filtro=2">Ver Inativos</a>  | 
        <a href="?filtro=3">Ver Todos</a> | 
        <a href="?filtro=4">Ver deletados</a>
    <hr>
    <table border="2">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Codigo</th>
                <th>Preco</th>
                <th>Estoque</th>
                <th>Ativo</th>
                <th>isDeleted</th>
                <th>Cadastrado Em</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($data as $key=>$linha):?>
                <?php $cor = ($linha["ativo"] == 0 || $linha["isDeleted"] == "*") ? "color: red;  font-weight: bolder;" : ""; ?>
                <tr style="<?=$cor;?><">
                    <td> <?= $linha["id"] ?> </td>
                    <td> <?= ucwords($linha["nome"]) ?> </td>
                    <td> <?= mb_strtoupper($linha["codigo"]) ?> </td>
                    <td> <?= $linha["preco"] ?> </td>
                    <td> <?= $linha["estoque"] ?> </td>
                    <td> <?= ($linha["ativo"]) ? "Ativo" : "Inativo" ?> </td>
                    <td> <?= $linha["isDeleted"]?> </td>
                    <td> <?= $linha["cadastradoEm"] ?> </td>
                    
                    <td>
                        <a href="deletar.php?id=<?=$linha['id']?>&codigo=<?=$linha['codigo']?>&status=<?=$linha["ativo"]?>"><?= ($linha["ativo"]) ? "Inativar" : "Ativar" ?> </a> | 
                        <a href="deletar.php?id=<?=$linha['id']?>&codigo=<?=$linha['codigo']?>&del=<?= ($linha["isDeleted"] == "*") ? 'restaurar' : 'excluir' ?>"><?= (isset($_GET["filtro"]) && $_GET["filtro"] == 4) ? "Restaurar" : "Excluir"?></a>
                    </td>
                 </tr>
            <?php endforeach;?>
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