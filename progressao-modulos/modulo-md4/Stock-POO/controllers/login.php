<?php

    // var_dump($_POST);
    include_once "../models/Config.php";
    include_once  Config::pathBase()."../models/Connect.php";
    include_once  Config::pathBase()."../models/Manager.php";

    // variável recebe todos os registros da tabela `USUARIO`
    $manager = new Manager;
    
    $email = $_POST["email"];
    $senha = sha1($_POST["senha"]);

    $login = $manager->select_common("usuarios", null, ["email"=>$email], " limit 1");

    if(!$login){

        header("location: ".Config::urlBase()."?msg=login_error");
    
    } elseif ($login[0]["senha"] != $senha){

        header("location: ".Config::urlBase()."?msg=pass_error");

    } else{
        // $hora = "CURRENT_TIMESTAMP";
        // $manager->update_common("usuarios", ["loginAtual"=> $hora], ["id"=>$login[0]["id"]], null);
        // $login = $manager->select_common("usuarios", null, ["email"=>$email], " limit 1");
        
        session_start();

        unset($login[0]["senha"]);

        $_SESSION[sha1("user")] = $login[0];
        header("location: ".Config::urlBase());
    }

?>