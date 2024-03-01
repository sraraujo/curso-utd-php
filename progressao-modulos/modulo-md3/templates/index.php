<?php

    // traz as configurações de comeão com banco de dados    
    require_once "../templates/configuracao-crud/conexao.php";
    include_once "../templates/configuracao-crud/crud.php";

    session_start();

    if (!isset($_SESSION["user"])){
        header("location: modules/pages-login/login.php?msg=forbidden");
    }

    $user = $_SESSION["user"];
    
    $filtros = array();
    $data = array();

    if (isset($_GET["codigo"]) && !empty($_GET["codigo"])){
        $filtros['codigo'] = $_GET["codigo"];
        
        $data = selecionar("produtos", null, $filtros, null);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Jonas De Araújo Pereira" />
        <title>Sistema Stock-X</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet"/>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- FAVICON  -->
        <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="assets/favicon/android-chrome-512x512.png" type="image/x-icon">
        <link rel="shortcut icon" href="assets/favicon/android-chrome-192x192.png" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">

    </head>

    <body class="sb-nav-fixed">
        <!-- NAV BARRA HORIZONTAL -->
        <?php include_once "components/nav.php" ?>
        <div id="layoutSidenav">
            <!-- MENU -->
            <?php include_once "components/menu.php"?>

            <div id="layoutSidenav_content">
                <div class="container">
                    <main>
                        <div class="container-fluid px-4">
                            <div class="card my-4">
                                <!-- <div class="card-header">
                                    <h2>Busca Rápida de Produto</h2>
                                </div> -->
                                <div class="card-body">
                                    <div class="card-header bg-primary-subtle">
                                        <h2 class="text-center">Busca Rápida de Produto</h2>
                                    </div>

                                    <form action="#" method="get" class="text-center my-5">
                                        <div class="container">
                                            <div class="row col-lg-6 col-md-7 col-sm-10 mx-auto">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="codigo" id="codigo" minlength="4" maxlength="15"
                                                        required placeholder="Digite o código do produto" aria-label="codigo" aria-describedby="basic-addon1"aria-label="Username" aria-describedby="basic-addon1">
                                            
                                                    <button type="submit"class="btn bg-primary-subtle input-group-text" id="basic-addon1" title="Fazer Pesquisa">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 24 24"><path fill="black" d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0c.41-.41.41-1.08 0-1.49zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- TABLE -->
                                    <?php if(isset($_GET["codigo"])) :?>
                                        <table class="table table-bordered table-striped " id="datatablesSimple">
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
                                                        <?php $cor = ($linha["ativo"] == 0 || $linha["isDeleted"] == "*") ? "color: red;" : ""; ?>
                                                        <tr style="<?=$cor;?><">
                                                            <td> <?= $linha["nome"] ?> </td>
                                                            <td> <?= $linha["codigo"] ?> </td>
                                                            <td> R$ <?= str_replace(".", ",", $linha["preco"]) ?> </td>
                                                            <td> <?= $linha["estoque"] ?> </td>
                                                            <td> <?= $linha["ativo"] ? "Disponível" : "Indisponível" ?> </td>
                                                            <td> <?= $linha["cadastradoEm"] ?> </td>
                                                            
                                                        </tr>
                                                    <?php endforeach;?>
                                                <?php endif; ?>

                                                <?php if (count($data) == 0): ?>
                                                    <tr rowspan="4">
                                                        <td class="text-center" colspan="6" style="height: 50px;">
                                                            Produto não encontrado!
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    <?php endif;?>                                   

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
                                    
                                </div>
                            </div>
                        </div>
                    </main>
                </div>

                <div class="container">
                    <?php include_once "components/footer.php" ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
