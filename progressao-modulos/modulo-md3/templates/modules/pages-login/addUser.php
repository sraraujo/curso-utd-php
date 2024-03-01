<?php

    // parte do codigo que recebe os dados do BD: nome do BD, nome d oprojeto 
    // em caso de erro, ela não roda o restante do script, mas o RIQUERE pode ser trocado pelo INCLUDE_ONCE
    require_once "../../configuracao-crud/conexao.php";

    include_once "../../configuracao-crud/crud.php";

    session_start();

    if (isset($_SESSION[md5("user")])) {
        header("location: ../templates/index.php");
    }

    if (isset($_GET["user_data"])) {
        $dataUser = explode(" - ", base64_decode($_GET["user_data"]));

        echo "<script> alert('[ Cadastro Malsucedido ] - As senha não conferem, tente novamente!') </script>";
    }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/favicon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/favicon//android-chrome-192x192.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon//favicon-16x16.png">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/addAdim.css">

</head>

<body style="background-color: #233242;">

    <main>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-5 col-md-8 col-sm-12 mx-auto">
    
                    <div style="display:flex;width:100%;" class="mt-2">
    
                        <!-- <div class="my-4">
                        </div> -->
    
                        <!-- Formulário de Cadastro -->
                        <form action="validator.php" method="post">
    
                            <!-- <div class="col-12 card-header text-center mb-5">
                                <span class="nomeApp">
                                    <img src="../imagens/00.png" alt="Logo do sistema de estoque" width="40px"> Sistema Stock-<span class="vermelho">X</span>
                                </span>
                            </div> -->

                            <span title="Voltar">
                                <a href="login.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="2.8rem" viewBox="0 0 24 24"><path fill="#0b5ed7" d="M2 12A10 10 0 0 1 12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12m16-1h-8l3.5-3.5l-1.42-1.42L6.16 12l5.92 5.92l1.42-1.42L10 13h8z"/></svg>
                                </a>
                            </span>

                            <h4 class="mb-5 text-center"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="2.2rem" viewBox="0 0 640 512"><path fill="#0b5ed7" d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32S80 82.1 80 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2M480 256c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96s43 96 96 96m48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4c24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48c0-61.9-50.1-112-112-112"/></svg>Cadastrar Usuário
                            </h4>
    
                            <div style="width:100%;">
                                <label for="nome">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" viewBox="0 0 24 24">
                                        <path fill="#0b5ed7" fill-rule="evenodd" d="M10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12c0 3.771 0 5.657-1.172 6.828C19.657 20 17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172C2 17.657 2 15.771 2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4m3.25 5a.75.75 0 0 1 .75-.75h5a.75.75 0 0 1 0 1.5h-5a.75.75 0 0 1-.75-.75m1 3a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75m1 3a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 0 1.5h-3a.75.75 0 0 1-.75-.75M11 9a2 2 0 1 1-4 0a2 2 0 0 1 4 0m-2 8c4 0 4-.895 4-2s-1.79-2-4-2s-4 .895-4 2s0 2 4 2" clip-rule="evenodd" />
                                    </svg>
                                    Nome Completo:
                                </label>
                                <input type="text" name="nome" id="nome" value="<?= (isset($_GET["user_data"])) ? $dataUser[0] : ""; ?>" required>
                            </div>
                            <div style="width:100%;">
                                <label for="email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" viewBox="0 0 24 24">
                                        <path fill="#0b5ed7" d="M3 21q-.825 0-1.412-.587T1 19V6.5h2V19h16.5v2zm4-4q-.825 0-1.412-.587T5 15V5q0-.825.588-1.412T7 3h14q.825 0 1.413.588T23 5v10q0 .825-.587 1.413T21 17zm7-4.7l7-4.875V5l-7 4.85L7 5v2.425z" />
                                    </svg>
                                    E-mail:
                                </label>
                                <input type="email" name="email" id="email" value="<?= (isset($_GET["user_data"])) ? $dataUser[1] : ""; ?>" required onblur="validarEmail()">
                            </div>
                            <div style="width:100%;">
                                <label for="confirmarEmail">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" viewBox="0 0 24 24">
                                        <path fill="#0b5ed7" d="M3 21q-.825 0-1.412-.587T1 19V6.5h2V19h16.5v2zm4-4q-.825 0-1.412-.587T5 15V5q0-.825.588-1.412T7 3h14q.825 0 1.413.588T23 5v10q0 .825-.587 1.413T21 17zm7-4.7l7-4.875V5l-7 4.85L7 5v2.425z" />
                                    </svg>
                                    Confirmar e-mail:
                                </label>
                                <input type="email" name="confirmarEmail" id="confirmarEmail" value="<?= (isset($_GET["user_data"])) ? $dataUser[2] : ""; ?>" required onblur="validarEmail()">
                            </div>
                            <div style="width:47%;">
                                <label for="senha">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 24 24"><path fill="#0b5ed7" d="M8.95 8.6a6.554 6.554 0 0 1 6.55-6.55c3.596 0 6.55 2.819 6.55 6.45a6.554 6.554 0 0 1-6.55 6.55a6.243 6.243 0 0 1-1.552-.204A1.25 1.25 0 0 1 12.7 16.05h-1.75v1.75c0 .69-.56 1.25-1.25 1.25H7.95v1.25a1.75 1.75 0 0 1-1.75 1.75H3.7a1.75 1.75 0 0 1-1.75-1.75v-2.172c0-.73.29-1.429.806-1.944L8.99 9.948a.275.275 0 0 0 .07-.244A6.386 6.386 0 0 1 8.95 8.6m9.3-1.6a1.25 1.25 0 1 0-2.5 0a1.25 1.25 0 0 0 2.5 0"/>
                                    </svg>
                                    Senha
                                </label>
                                <input type="password" name="senha" id="senha" minlength="3" req uired onblur="validarSenhas()">
                            </div>
                            <div style="width:47%;margin-left:6%">
                                <label for="confirmarSenha">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 24 24"><path fill="#0b5ed7" d="M8.95 8.6a6.554 6.554 0 0 1 6.55-6.55c3.596 0 6.55 2.819 6.55 6.45a6.554 6.554 0 0 1-6.55 6.55a6.243 6.243 0 0 1-1.552-.204A1.25 1.25 0 0 1 12.7 16.05h-1.75v1.75c0 .69-.56 1.25-1.25 1.25H7.95v1.25a1.75 1.75 0 0 1-1.75 1.75H3.7a1.75 1.75 0 0 1-1.75-1.75v-2.172c0-.73.29-1.429.806-1.944L8.99 9.948a.275.275 0 0 0 .07-.244A6.386 6.386 0 0 1 8.95 8.6m9.3-1.6a1.25 1.25 0 1 0-2.5 0a1.25 1.25 0 0 0 2.5 0"/></svg>
                                    <span>Confirmar Senha:</span>
                                </label>
    
                                <input type="password" name="confirmarSenha" id="confirmarSenha" minlength="3" required onblur="validarSenhas()">
                            </div>

                            <input type="hidden" name="action" value="cadastro">
                            <input type="hidden" name="ativo" value="1">
                            <input type="hidden" name="isDeleted" value="">


                            <div class="col-12 text-center mx-auto">
                                <button type="reset" class="btn btn-secondary mr-5">Limpar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
    
                    </div>
                </div>
                
            </div>
        </div>
    </main>

    <!-- Js do formulário -->
    <script src="scripts/js-formulario.js"></script>

</body>

</html>
