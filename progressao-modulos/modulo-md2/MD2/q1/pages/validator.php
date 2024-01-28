<?php 

    $username["email"] = $_POST["email"];
    $username["senha"] = $_POST["senha"];

    if ($username["email"] != "jonas@email.com" || $username["senha"] != '123'){
        header("location: ../index.php?error=login_erro");
    
    } else{
        
        $data['name'] = "Jonas A. Pereira";
        $data["login"] = date(("d/m/Y H:i:s"));
        $data["email"] = $username["email"];

        session_start();
        
        $_SESSION[md5("user_name")] = $data;
        header("location: ../index.php");
    }

?>
