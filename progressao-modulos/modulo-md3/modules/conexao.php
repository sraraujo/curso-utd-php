<?php

    # Configurações do Sistema
    $projectName = "Sistema Stock";
    $projectFolderName = "sistema-busca-preco"; 
    $version = "0.1";

    # variáveis de conexão     
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "busca_preco";

    #Criar conexão // passa as variáveis criadas // or die, serve para retorno em caso de erro
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco) or die(mysqli_connect_error());

?>