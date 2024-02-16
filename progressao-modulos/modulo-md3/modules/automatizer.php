<?php

    // traz as configurações de comeão com banco de dados    
    require_once "conexao.php";
    
    include_once "crud.php";

    $data = selecionar("usuarios", null, null, null);

    $titulos = array_keys($data[0]);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Produtos</title>
</head>
<body>

    <table border="2">
        <thead>
            <tr>
                <?php foreach ($titulos as $titulo): ?>
                    <th> <?= $titulo; ?> </th>
                <?php endforeach; ?>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($data as $linha):?>
                <tr>

                    <?php foreach ($titulos as $titulo): ?>
                        <td> <?= $linha[$titulo]; ?> </td>
                    <?php endforeach; ?>

                    <td> <?= $linha["id"] ?> </td>
                                        
                    <td>
                        <a href="deletar.php?id=<?=$linha['id']?>">Excluir</a>
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
                
                case "proibido":
                    echo "<script> alert(' [ERRO] - Acesso Negado! ') </script>";
                    break;
            }    
        ?>
    <?php endif;?>
    
</body>
</html>