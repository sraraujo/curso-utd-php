<?php

    require_once "conexao.php";
    include_once "crud.php";

    session_start();

    if (!isset($SESSO["user"])){
        header("location: ../../pages/login.php");
    }

    $user = $_SESSION["user"];

    if(isset($_GET["id"])){
        
        $filtro['id'] = $_GET['id'];    
        $dados = array();
        
        // trecho que vai mudar o status em 0 / 1 // 1 = ativo || 0 = inativo
        if (isset($_GET["status"])){
            $dados["ativo"] = ($_GET["status"] == 1) ? '0' : '1';
            $situacao = ($dados["ativo"] == 0) ? "INATIVO" : "ATIVO";

            inserir("log", ["tipo" => "Alteração de Status", "conteudo" => "Produto com código: ".($_GET["codigo"]).", foi marcado como $situacao, pelo usuario: ".$user['apelido']."."]);
        
        // codigo que exclui / restaura 
        } else {

            // trecho que vai marcar o isDeleted = '*' // simular como deletado
            if ($_GET["del"] == "excluir"){
                $dados['isDeleted'] = '*';
                $situacao = "EXCLUIDO";
                $frase = 'delete-ok';

                inserir("log", ["tipo" => "Alteração de Status", "conteudo" => "Produto com código: ".($_GET["codigo"]).", foi marcado como $situacao, pelo usuario: ".$user['apelido']."."]);

            
            // trecho que vai marcar o isDeleted = '' // restaura
            } elseif ($_GET["del"] == "restaurar"){
                $dados['isDeleted'] = '';
                $situacao = "RESTAURADO";
                $frase = 'restauration-ok';

                inserir("log", ["tipo" => "Alteração de Status", "conteudo" => "Produto com código: ".($_GET["codigo"]).", foi marcado como $situacao, pelo usuario: ".$user['apelido']."."]);
                
            // caso haja algum erro
            } else {
                $frase = 'delete-erro';
            }
        }

        $resultado = atualizar("produtos", $dados, $filtro);
        
        if ($resultado){
            header("location: ../listProduct.php?msg=$frase");
        
        }else {
            header("location: ../listProduct.php?msg=$frase");
        }

    }else {
        header("location: lista.php?msg=proibido");
    }

?> 