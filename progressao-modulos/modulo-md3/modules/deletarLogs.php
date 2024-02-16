<?php

    require_once "conexao.php";
    include_once "crud.php";


    if (isset($_GET["id"])){

        $filtro['id'] = $_GET["id"];

        $resutado = deletar('log',  $filtro);

        if ($resutado){
            header("location: logs.php?msg=delete-ok");
        
        } else{
            header("location: logs.php?msg=delete-erro");
        }
    }

?>