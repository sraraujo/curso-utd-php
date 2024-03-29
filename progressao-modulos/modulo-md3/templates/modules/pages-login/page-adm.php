<?php

    session_start();

    if (!isset($_SESSION["user"])){
        header("location: login.php?error=forbidden");
    }

    $user_data = $_SESSION["user"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Admistrador</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon/android-chrome-192x192.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/page-adm.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row col-lg-6 mt-5 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <img src="../../assets/img/00.png" alt="Logo do sistema de estoque" width="60px">
                    <span class="nomeApp">Sistema Stock-<a class="vermelho">X</a></span>
                </div>
                
                <div class="card-body">
                    <h3 class="card-title text-center mt-3">Página de Log do Usuário</h3>

                    <div class="row">
                        <div class="col-auto offset-3 mt-4 mx-auto">
                            <p>
                                <strong>Nome:</strong>
                                <?= $user_data["nome"]?>
                            </p>
                        
                            <p>
                                <strong>E-mail:</strong>
                                <?= $user_data["email"]?>
                            </p>
                            <p>
                                <strong>Último Login:</strong>
                                <?= $user_data["loginFim"]?>
                            </p>
                        </div>
                    </div>

                </div>
                <a href="logout.php" class="btn btn-outline-primary mx-auto my-5" style="width: 100px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M12 10V8H7V6h5V4l3 3zm-1-1v4H6v3l-6-3V0h11v5h-1V1H2l4 2v9h4V9z"/></svg>
                    Sair
                </a>
            </div>


        </div>
    </div>

    <!-- Js do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>