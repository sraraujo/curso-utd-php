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
        <title>Cadastrar Produtos</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- FAVICON  -->
        <?php include_once "components/favicon.php" ;?>
        <!-- CSS -->
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
                        <h1 class="mt-4">Novo Produto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Sistema Stock-X</a></li>
                            <li class="breadcrumb-item active">Cadastrar Produto</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Cadastrar Novo Produto
                            </div>
                            <div class="card-body">
                                    
                                <!-- FORMULÁRIO -->
                                <form action="#" method="post" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-lg-6 col-xm-12">
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 24 24"><path fill="#212529" d="M21.993 7.95a.96.96 0 0 0-.029-.214c-.007-.025-.021-.049-.03-.074c-.021-.057-.04-.113-.07-.165c-.016-.027-.038-.049-.057-.075c-.032-.045-.063-.091-.102-.13c-.023-.022-.053-.04-.078-.061c-.039-.032-.075-.067-.12-.094c-.004-.003-.009-.003-.014-.006l-.008-.006l-8.979-4.99a1.002 1.002 0 0 0-.97-.001l-9.021 4.99c-.003.003-.006.007-.011.01l-.01.004c-.035.02-.061.049-.094.073c-.036.027-.074.051-.106.082c-.03.031-.053.067-.079.102c-.027.035-.057.066-.079.104c-.026.043-.04.092-.059.139c-.014.033-.032.064-.041.1a.975.975 0 0 0-.029.21c-.001.017-.007.032-.007.05V16c0 .363.197.698.515.874l8.978 4.987l.001.001l.002.001l.02.011c.043.024.09.037.135.054c.032.013.063.03.097.039a1.013 1.013 0 0 0 .506 0c.033-.009.064-.026.097-.039c.045-.017.092-.029.135-.054l.02-.011l.002-.001l.001-.001l8.978-4.987c.316-.176.513-.511.513-.874V7.998c0-.017-.006-.031-.007-.048m-10.021 3.922L5.058 8.005L7.82 6.477l6.834 3.905zm.048-7.719L18.941 8l-2.244 1.247l-6.83-3.903zM13 19.301l.002-5.679L16 11.944V15l2-1v-3.175l2-1.119v5.705z"/></svg>
                                                    Nome / Descrição
                                                </label>
                                                <input type="text" class="form-control" name="nome">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xm-12">
                                            <div class="mb-3">
                                                <label for="codigo" class="form-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 2 24 24"><path fill="#212529" d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2M8 17H5V7h3zm2 0H9V7h1zm2 0h-1V7h1zm4 0h-3V7h3zm3 0h-2V7h2z"/></svg>
                                                    Código 
                                                </label>
                                                <input type="text" class="form-control" maxlength="15" name="codigo" id="internalCode">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xm-12">
                                            <div class="mb-3">
                                                <label for="preco" class="form-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 2 24 24"><path fill="#212529" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10s10-4.486 10-10S17.514 2 12 2m1 14.915V18h-2v-1.08c-2.339-.367-3-2.002-3-2.92h2c.011.143.159 1 2 1c1.38 0 2-.585 2-1c0-.324 0-1-2-1c-3.48 0-4-1.88-4-3c0-1.288 1.029-2.584 3-2.915V6.012h2v1.109c1.734.41 2.4 1.853 2.4 2.879h-1l-1 .018C13.386 9.638 13.185 9 12 9c-1.299 0-2 .516-2 1c0 .374 0 1 2 1c3.48 0 4 1.88 4 3c0 1.288-1.029 2.584-3 2.915"/></svg>
                                                    Preço
                                                </label>
                                                <input type="text" class="form-control" name="preco" id="priceCompra">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xm-12">
                                            <div class="mb-3">
                                                <label for="estoque" class="form-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 16 16"><path fill="#212529" d="M12 6V0H4v6H0v7h16V6zm-5 6H1V7h2v1h2V7h2zM5 6V1h2v1h2V1h2v5zm10 6H9V7h2v1h2V7h2zM0 16h3v-1h10v1h3v-2H0z"/></svg>
                                                    Estoque
                                                </label>
                                                <input type="number" class="form-control" name="estoque" id="estoque">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xm-12">
                                            <div class="mb-3">
                                                <label for="imagemLink" class="form-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 2 24 24"><path fill="#212529" d="m9 13l3-4l3 4.5V12h4V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-4H5l3-4z"/><path fill="#212529" d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z"/></svg>
                                                    Imagem ou (link da Web)
                                                </label>
                                                <input type="text" class="form-control" name="imagemLink" id="imagemLink">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="ativo" value="1">
                                    <input type="hidden" name="isDeleted" value="">

                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            <p class="text-end">
                                                <button type="reset" class="btn btn-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 2 24 24"><path fill="white" d="M3 20V8h18v12zM3 7V5h6V3h6v2h6v2z"/></svg>
                                                    Limpar
                                                </button>
                                            </p>
                                        </div>
                                        <div class="col-6 mt-3">    
                                            <p class="text-start">
                                                <button class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 2 24 24"><path fill="white" fill-rule="evenodd" d="M4 3a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V8a1 1 0 0 0-.293-.707l-4-4A1 1 0 0 0 16 3zm6 11c0-1.6 1.333-2 2-2s2 .4 2 2s-1.333 2-2 2s-2-.4-2-2m4-9H8v3h6z" clip-rule="evenodd"/></svg>
                                                    Cadastrar
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- FOOTER -->
                <?php include_once "components/footer.php" ;?>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#priceCompra').mask('000.000,00', {reverse: true});
                $('#priceVenda').mask('000.000,00', {reverse: true});
                $('#barCode').mask('0000000000000', {reverse: true});
                $('#estoque').mask('0000', {reverse: true}); 
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <!-- Link para icones do Iconify -->
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    </body>
</html>

<?php

    if (isset($_POST["nome"]) and !empty($_POST["nome"])){
            
        // variavel recebe o nome da tebela e os dados a cadastrar, e manda para o banco de dados
        $resultado = inserir("produtos", $_POST);

        
        if ($resultado){
            echo "<script> alert(' Produto cadastrado com sucesso! ') </script>";
            inserir("log", ["tipo" => "Inserção de Registro", "conteudo" => "O produto com ID: ".$_POST['codigo']." foi cadastrado pelo usuario " .$user['nome']."."]);

          } else {
              echo "<script> alert(' [ ERRO ] - Não foi possível cadastrado o produto! ') </script>";
              inserir("log", ["tipo" => "Inserção de Registro", "conteudo" => "O usuario XXXX tentou cadastrar o produto com ID: ".$_POST['codigo']]);
          }
    }
?>

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