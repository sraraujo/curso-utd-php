<?php

    include_once "models/Config.php";
    include_once "controllers/validate.php";

    function pageContent(){
        validarPagina();
    }

    session_start();

    if (!isset($_SESSION[sha1("user")])){
        header("location: ".Config::urlBase()."?error=acess_denied");
    }

    $dados = $_SESSION[sha1("user")];

    include_once "views/layout.php";

?>