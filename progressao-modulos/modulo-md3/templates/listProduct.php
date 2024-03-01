<?php

    // traz as configurações de comeão com banco de dados    
    require_once "configuracao-crud/conexao.php";
    
    include_once "configuracao-crud/crud.php";

    // para mostrar ativo e inativos, exceto os deletados
    // $filtros['isDeleted'] = "";
    
    // para mostrar todos
    // $filtros = null;

    session_start();

    if (!isset($_SESSION["user"])){
        header("location: modules/pages-login/login.php?msg=forbidden");
    }

    $user = $_SESSION["user"];

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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lista de Produtos</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- FAVICON  -->
        <?php include_once "components/favicon.php" ;?>
        <!-- CSS -->
        <link rel="stylesheet" href="modules/style.css">
    </head>
    <body class="sb-nav-fixed">
        <?php include_once "components/nav.php" ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include_once "components/menu.php" ;?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Lista  de Produtos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Sistema Stock-X</a></li>
                            <li class="breadcrumb-item active">Lista  de Produtos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Lista de Produtos Cadastrados
                            </div>
                            <div class="card-body">
                                 <div class="text-center">
                                    <strong>Opções de Visualização: </strong>
                                    <a class="visualizar" href="?filtro=1">Ver Ativos</a> | 
                                    <a class="visualizar" href="?filtro=2">Ver Inativos</a>  | 
                                    <a class="visualizar" href="?filtro=3">Ver Todos</a> | 
                                    <a class="visualizar" href="?filtro=4">Ver deletados</a>
                                    <hr>
                                 </div>
                                    
                                <!-- TABLE -->
                                <table class="table table-striped" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
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
                                            <tr>
                                                <td> <?= $key + 1 ?> </td>
                                                <td> <?= $linha["nome"] ?> </td>
                                                <td> <?= $linha["codigo"] ?> </td>
                                                <td> <?= $linha["preco"] ?> </td>
                                                <td> <?= $linha["estoque"] ?> </td>
                                                <td> <?= ($linha["ativo"]) ? "Ativo" : "Inativo" ?> </td>
                                                <td> <?= $linha["isDeleted"]?> </td>
                                                <td> <?= $linha["cadastradoEm"] ?> </td>
                                                
                                                <td>
                                                    <a href="configuracao-crud/deletar.php?id=<?=$linha['id']?>&codigo=<?=$linha['codigo']?>&status=<?=$linha["ativo"]?>"><?= ($linha["ativo"]) ? "Inativar" : "Ativar" ?> </a> | 
                                                    
                                                    <a href="configuracao-crud/deletar.php?id=<?=$linha['id']?>&codigo=<?=$linha['codigo']?>&del=<?= ($linha["isDeleted"] == "*") ? 'restaurar' : 'excluir' ?>"><?= (isset($_GET["filtro"]) && $_GET["filtro"] == 4) ? "Restaurar" : "Excluir"?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- FOOTER -->
                <?php include_once "components/footer.php" ;?>
            </div>
        </div>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
