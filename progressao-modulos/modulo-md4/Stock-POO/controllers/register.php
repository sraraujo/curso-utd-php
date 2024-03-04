<?php

    include_once "../models/Connect.php";
    include_once "../models/Config.php";
    include_once "../models/Manager.php";

    // trecho para cadastrar novos usuarios
    if(isset($_POST["action"])){
            
        if($_POST["email"] != $_POST["confirmarEmail"]){
            echo "<script> alert('ERRO - emails não conferem, tente novamente!') </script>";
            header("location: ../register.php");

        }elseif ($_POST["senha"] != $_POST["confirmarSenha"]){
            echo "<script> alert('ERRO - senhas não conferem, tente novamente!') </script>";
            header("location: ../register.php");

        } else{

            if($_POST["action"] == "cadastrar"){

                unset($_POST["action"]);
                unset($_POST["confirmarEmail"]);
                unset($_POST["confirmarSenha"]);

                $_POST["nome"] = ucwords($_POST["nome"]);
                $_POST["senha"] = sha1($_POST["senha"]);

                $manager = new Manager;
                $manager->insert_common("usuarios", $_POST, null, null);

                header("location: " .Config::urlBase()."?msg=registered-user");
            }

        }
        
    }

?>