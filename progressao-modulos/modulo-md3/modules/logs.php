<?php

    // traz as configurações de comeão com banco de dados    
    require_once "conexao.php";
    include_once "crud.php";

    $data = selecionar("log", null, null, null);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log's do Sistema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <table border="2">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo</th>
                <th>Conteúdo</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($data as $linha):?>
                <tr style="<?=$cor;?><">
                    <td> <?= $linha["id"] ?> </td>
                    <td> <?= $linha["tipo"] ?> </td>
                    <td> <?= $linha["conteudo"] ?> </td>
                    <td> <?= $linha["criadoEm"] ?> </td>
                    
                    <td>
                        <a href="deletarLogs.php?id=<?=$linha['id']?>"> Excluir </a>  
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