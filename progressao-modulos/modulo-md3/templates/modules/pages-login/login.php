<?php

    session_start();

    if (isset($_SESSION["user"])) {
        header("location: ../../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/favicon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/favicon/android-chrome-192x192.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">
</head>

<body>

    <div class="wrapper fadeInDown" style="background-color: #233242;">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="../../assets/img/00.png" id="icon" alt="User Icon" class="my-3"/>
                <!-- <h3 class="mb-5">Sistema de Estoque</h3> -->
                <h3 class="mb-5">Sistema Stock-X</h3>
                <!-- <h3 class="mb-5">Controle de Estoque</h3> -->
            </div>

            <!-- Login Form -->
            <form action="validator.php" method="post">
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="E-mail" required>
                <input type="password" id="password" class="fadeIn third my-3" name="senha" placeholder="Senha" required>
                <input type="hidden" name="action" value="logar">
                <!-- Botão Entrar -->
                <input type="submit" class="btn btn-primary" value="Entrar" width="100%">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover btn" href="addUser.php">Cadastre-se</a>
            </div>            
        </div>

        <div class="row text-center">
            <a href="../../../index.php" class="text-white mt-3">Acessar Buscador</a>
        </div>
    </div>

    <?php if (isset($_GET["msg"])) : ?>
        <?php switch ($_GET["msg"]) {

            case 'login_erro':
                echo "<script> alert('ERRO: Login ou senha inválida!') </script>";
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