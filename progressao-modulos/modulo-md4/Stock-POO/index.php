<?php

    include_once "models/Config.php";
    include_once Config::pathBase()."../models/Connect.php";
    include_once Config::pathBase()."../models/Manager.php";


    session_start();

    if(isset($_SESSION[sha1("user")])){

        $dados = $_SESSION[sha1("user")];
        
        header("location: sistema.php");
        // header("location: ".Config::urlBase()."/views/layout.php");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="views/template/css//login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- FAVICON -->
    <?php include_once "views/components/favicon.php" ;?>
</head>

<body>

    <div class="wrapper fadeInDown" style="background-color: #233242;">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="views/template/assets/img/00.png" id="icon" alt="User Icon" class="my-3"/>
                <!-- <h3 class="mb-5">Sistema de Estoque</h3> -->
                <h3 class="mb-5">Sistema Stock-X</h3>
                <!-- <h3 class="mb-5">Controle de Estoque</h3> -->
            </div>

            <!-- Login Form -->
            <form action="controllers/login.php" method="post">
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="E-mail" required>
                <input type="password" id="password" class="fadeIn third my-3" name="senha" placeholder="Senha" required>
                <input type="hidden" name="action" value="logar">
                <!-- Botão Entrar -->
                <input type="submit" class="btn btn-primary" value="Entrar" width="100%">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover btn" href="views/register.php">Cadastre-se</a>
            </div>            
        </div>

    </div>

    <?php if (isset($_GET["msg"])) : ?>
        <?php switch ($_GET["msg"]) {

            case 'login_error':
                echo "<script> alert('ERRO: Login ou senha inválida!') </script>";
                break;
            
            case 'pass_error':
                echo "<script> alert('ERRO: Senha inválida, tente novamente!') </script>";
                break;

            case "user-null":
                echo "<script> alert('ERRO: Usuário não cadastrado!') </script>";
                break;
            
            case "registered-user":
                echo "<script> alert('Usuário Cadastrado com Sucesso!') </script>";
                break;

            case 'forbidden':
                echo "<script> alert('Acesso negado!') </script>";
                break;
            }
        ?>

    <?php endif; ?>

</body>

</html>
