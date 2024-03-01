<?php

    // traz as configurações de comeão com banco de dados    
    require_once "templates/configuracao-crud/conexao.php";
    include_once "templates/configuracao-crud/crud.php";

    session_start();

    if (isset($_SESSION["user"])){
        header("location: templates/index.php");
    }

    $data = array();

    if (isset($_GET["nome"]) && !empty($_GET["nome"]) ){
        
        $extra = "WHERE `nome` LIKE '%$_GET[nome]%';";
        $data = selecionar("produtos", null, null, $extra);
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
        <link href="templates/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- FAVICON  -->
        <link rel="shortcut icon" href="templates/assets/favicon/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="templates/assets/favicon/android-chrome-512x512.png" type="image/x-icon">
        <link rel="shortcut icon" href="templates/assets/favicon/android-chrome-192x192.png" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="templates/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="templates/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="templates/assets/favicon/favicon-16x16.png">
    </head>

    <body class="sb-nav-fixed">
        <!-- NAV BARRA HORIZONTAL -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Sistema Stock-X</a>
            <!-- Sidebar Toggle-->
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg class="login" xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 24 24"><g fill="none" stroke="white" stroke-linecap="round" stroke-width="2"><path stroke-dasharray="46" stroke-dashoffset="46" d="M8 5V4C8 3.44772 8.44772 3 9 3H18C18.5523 3 19 3.44772 19 4V20C19 20.5523 18.5523 21 18 21H9C8.44771 21 8 20.5523 8 20V19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="46;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M4 12h11" opacity="0"><set attributeName="opacity" begin="0.6s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M15 12l-3.5 -3.5M15 12l-3.5 3.5" opacity="0"><set attributeName="opacity" begin="0.8s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="6;0"/></path></g></svg>
                        <!-- <i class="fas fa-user fa-fw"></i> -->
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#!">Informações de Login</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                        <li>
                            <a class="dropdown-item" href="templates/modules/pages-login/login.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 24 24"><g fill="none" stroke="black" stroke-linecap="round" stroke-width="2"><path stroke-dasharray="46" stroke-dashoffset="46" d="M8 5V4C8 3.44772 8.44772 3 9 3H18C18.5523 3 19 3.44772 19 4V20C19 20.5523 18.5523 21 18 21H9C8.44771 21 8 20.5523 8 20V19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="46;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M4 12h11" opacity="0"><set attributeName="opacity" begin="0.6s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M15 12l-3.5 -3.5M15 12l-3.5 3.5" opacity="0"><set attributeName="opacity" begin="0.8s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="6;0"/></path></g></svg>
                                Fazer Login
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="container-fluid mt-5 px-4">
            <div class="row">
                <div class="card col-lg-10 col-xs-12 mx-auto my-5">
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
                                        <input type="text" class="form-control" name="nome" id="nome" minlength="2" maxlength="20"
                                            required placeholder="Digite o nome do produto" aria-label="nome" aria-describedby="basic-addon1"aria-label="Username" aria-describedby="basic-addon1">
                                
                                        <button type="submit"class="btn bg-primary-subtle input-group-text" id="basic-addon1" title="Fazer Pesquisa">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 24 24"><path fill="black" d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0c.41-.41.41-1.08 0-1.49zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- TABLE -->
                        <?php if(isset($_GET["nome"])) :?>
                            <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
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
                                            <tr>
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
                        <?php endif; ?>
                    </div>
                </div>

                <!-- <?php include_once "templates/components/footer.php" ?> -->
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="templates/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="templates/assets/demo/chart-area-demo.js"></script>
        <script src="templates/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="templates/js/datatables-simple-demo.js"></script>
    </body>
</html>

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
