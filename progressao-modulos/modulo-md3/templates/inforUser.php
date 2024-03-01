<?php

    // traz as configurações de comeão com banco de dados    
    require_once "configuracao-crud/conexao.php";
    include_once "configuracao-crud/crud.php";

    session_start();

    if (!isset($_SESSION["user"])){
        header("location: ../pages/login.php?msg=forbidden");
    }

    $user = $_SESSION["user"];

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Informações do Usuário</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
        <!-- FAVICON  -->
        <?php include_once "./components/favicon.php" ;?>
        <!-- CSS -->
        <link rel="stylesheet" href="modules/style.css">
        <link rel="stylesheet" href="css/page-adm.css">
    </head>
    <body class="sb-nav-fixed">
        <!-- NAV -->
        <?php include_once "components/nav.php" ?>
        <div id="layoutSidenav">
            <!-- MENU -->
            <?php include_once "components/menu.php"?>

            <div id="layoutSidenav_content">
                <div class="container">
                    <main>
                        <div class="container-fluid mt-5 px-4">
                            <div class="card col-lg-6 mx-auto">
                                <div class="card-header text-center">
                                    <img src="assets/img/00.png" alt="Logo do sistema de estoque" width="60px">
                                    <span class="nomeApp">Sistema Stock-<a class="vermelho">X</a></span>
                                </div>
                                
                                <div class="card-body">
                                    <h3 class="card-title text-center mt-3">Informações do Usuário</h3>

                                    <!-- <div class="row">
                                        <div class="col-auto mt-4 mx-auto">
                                            <p>
                                                <strong>Nome:</strong>
                                                <?= $user["nome"]?>
                                            </p>
                                        
                                            <p>
                                                <strong>E-mail:</strong>
                                                <?= $user["email"]?>
                                            </p>
                                            <p>
                                                <strong>Sessão Atual:</strong>
                                                <?= $user["loginAtual"]?>
                                            </p>
                                            <p>
                                                <strong>Último Login:</strong>
                                                <?= $user["loginFim"]?>
                                            </p>
                                            <p>
                                                <strong>Cadastrado em: </strong>
                                                <?= $user["cadastradoEm"]?>
                                            </p>
                                        </div>
                                    </div> -->

                                    <table class="table table-bordered table-striped">
                                        <tbody>                                          
                                            <tr>
                                                <th> Nome </td>
                                                <td> <?= $user["nome"] ?> </td>
                                                
                                            </tr>
                                            <tr>
                                                <th> Email </th>
                                                <td> <?= $user["email"] ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Sessão Atual</th>
                                                <td> <?= $user["loginAtual"] ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Últim Login </td>
                                                <td> <?= $user["loginFim"] ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Cadastrado Em </td>
                                                <td> <?= $user["cadastradoEm"] ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
