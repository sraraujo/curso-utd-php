<?php

    require_once "../../configuracao-crud/conexao.php";
    include_once "../../configuracao-crud/crud.php";

    session_start();

    $data = $_SESSION["user"];

    // recebendo o ID para validar no UPDATE
    $id["id"] = $data["id"];

    // trecho que vai atualizar o datetime da sessão atual
    $atualizar["loginFim"] = "CURRENT_TIMESTAMP";
    atualizar("usuarios", $atualizar, $id);

    session_destroy();

    header("location: login.php?logout=success");
?>