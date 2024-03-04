<?php

    include_once "../models/Config.php";
    include_once Config::pathBase()."/models/Connect.php";
    include_once Config::pathBase()."/models/Manager.php";

    if($_REQUEST["action"]){

        unset($_POST["action"]);

        $manager = new Manager;

        switch ($_REQUEST["action"]){

            case "excluir":
                $frase = "delete-ok";
                $manager->delete_common("produtos", ["id" => $_POST["id"]], null, null);
                break;

            case "insert":
                $frase = "insert-ok";
                $manager->insert_common("produtos", $_POST, null, null);
                break;

            case "update":
                $frase = "edit-ok";
                $manager->update_common("produtos", $_POST, ["id"=>$_POST["id"]], null);
                break;
            }
            
        }
        
        header("location: " .Config::urlBase()."/sistema.php?pagina=listarProdutos&msg=$frase");
?>