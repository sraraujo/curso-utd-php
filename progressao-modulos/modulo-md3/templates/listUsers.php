<?php

    // traz as configurações de comeão com banco de dados    
    require_once "configuracao-crud/conexao.php";
    include_once "configuracao-crud/crud.php";

    session_start();

    if (!isset($_SESSION["user"])){
        header("location: ../pages/login.php?msg=forbidden");
    }

    $user = $_SESSION["user"];

    $data = selecionar("usuarios", null, null, null);

    $titulos = $data;

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lista de Usuários</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- FAVICON  -->
        <?php include_once "components/favicon.php" ;?>
        <!-- CSS -->
        <link rel="stylesheet" href="../modules/style.css">
    </head>
    <body class="sb-nav-fixed">
        <!-- NAV -->
        <?php include_once "components/nav.php" ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- MENU -->
                <?php include_once "components/menu.php" ;?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Lista de Usuários</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Sistema Stock-X</a></li>
                            <li class="breadcrumb-item active">Lista de Usuários</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Lista de Usuários Cadastrados
                            </div>
                            <div class="card-body">
                                 
                                <!-- TABLE -->
                                <table border="2" class="table table-striped" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Ativo</th>
                                            <th>Último Login</th>
                                            <th>Cadastrado Em</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                            <?php foreach ($titulos as $titulo):?>
                                                <tr>
                                                    <td><?= $titulo["id"] ;?></td>
                                                    <td><?= $titulo["nome"] ;?></td>
                                                    <td><?= $titulo["email"] ;?></td>
                                                    <td><?= ($titulo["ativo"] ? "Ativo" : "Inativo") ;?></td>
                                                    <td><?= $titulo["loginFim"] ;?></td>
                                                    <td><?= $titulo["cadastradoEm"] ;?></td>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
