<?php

    session_start();

    if (isset($_SESSION[md5("user_name")])){
        header("location: page-adim.php");
    }

    if (isset($_GET["user_data"])){
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
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/android-chrome-192x192.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/addAdim.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: #233242;">

    <main>
        <div class="container">
            <div class="row">
                <div style="display:flex;width:100%;" class="mt-4">
                        
                    <!-- Formulário de Cadastro -->
                    <form action="validator.php" method="post">
                        
                        <h3 class="text-decoration-underline mb-5">Cadastrar Novo Usuário</h3>

                        <div style="width:100%;">
                            <label for="nome">Nome Completo:</label>
                            <input type="text" name="nome" id="nome" value="<?=(isset($_GET["user_data"])) ? $dataUser[0] : "";?>" required>
                        </div>
                        <div style="width:100%;">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" value="<?=(isset($_GET["user_data"])) ? $dataUser[1] : "";?>" required>
                        </div>
                        <div style="width:47%;">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" required onblur="validarSenhas()">
                        </div>
                        <div style="width:47%;margin-left:6%">
                            <label for="senha">Confirmar Senha:</label>
                            <input type="password" name="confirmarSenha" id="confirmarSenha" required onblur="validarSenhas()">
                        </div>
                        <p>
                            <input type="hidden" name="action" value="cadastro">
                            <a href="../index.php" class="btn btn-primary mr-5">Voltar</a>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </p>
                    </form>

                </div>
            </div>
        </div>

    </main>

    <!-- Js do formulário -->
    <script src="components/js-formulario.js"></script>

</body>

</html>