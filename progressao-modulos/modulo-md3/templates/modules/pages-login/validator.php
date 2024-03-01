<?php 

    require_once "../../configuracao-crud/conexao.php";
    include_once "../../configuracao-crud/crud.php";

    date_default_timezone_set("America/Fortaleza");

    if (isset($_POST["action"]) ){

        if ($_POST["action"] == "logar"){

            unset($_POST["action"]);
                       
            $filtros["email"] = $_POST["email"];
 
            // fazendo a pesquisa do email no BD, se houver registro todos os dados são carregados na variável
            $validar = selecionar("usuarios", null, $filtros, null);

            $filtros["senha"] = sha1($_POST["senha"]);
            $data = array();

            // caso haja registro, a variável retorna com true e os dados do usuario com aquele emial
            if ($validar){

                // verifica se email e senha estão corretos para validar o login
                if ($validar[0]["email"] == $filtros["email"] && $validar[0]["senha"] == $filtros["senha"] ){
                    
                    // recebendo o ID para validar no UPDATE
                    $id["id"] = $validar[0]["id"];

                    // trecho que vai atualizar o datetime da sessão atual
                    $atualizar["loginAtual"] = "CURRENT_TIMESTAMP";
                    atualizar("usuarios", $atualizar, $id);

                    // atualizando os dados novamente
                    $validar = selecionar("usuarios", null, $filtros, null);
                    
                    foreach ($validar[0] as $key => $value ){
                        $data["$key"] = $value;
                    }

                    if (explode(" ", $data["nome"]) > 2){
                        $nome = explode(" ", $data["nome"]);
                        $sobrenome = count($nome) - 1;
                        $data["apelido"] = "$nome[0] $nome[$sobrenome]";
                    
                    } else {
                        $data["apelido"] = $data["nome"];
                    }     

                    session_start();
                    $_SESSION["user"] = $data;
                    header("location: login.php");
                    
                }else{
                    header("location: login.php?msg=login_erro");
                }

            }else{
                header("location: login.php?msg=user-null");
            }
 
        // condição para cadastrar usuários
        } elseif ($_POST["action"] == "cadastro"){

            // ação caso as senhas/emails sejam diferentes
            if ($_POST["senha"] != $_POST["confirmarSenha"] || $_POST["email"] != $_POST["confirmarEmail"]){

                // array criado para receber e carregar quando voltar para corrigir a senha
                $return["nome"] = $_POST["nome"];

                $return["email"] = ($_POST["email"] == $_POST["confirmarEmail"]) ? $_POST["email"] : "";
                $return["confirmarEmail"] = ($_POST["email"] == $_POST["confirmarEmail"]) ? $_POST["email"] : "";

                $return["senha"] = ($_POST["senha"] == $_POST["confirmarSenha"]) ? $_POST["senha"] : "";
                $return["confirmarSenha"] = ($_POST["senha"] == $_POST["confirmarSenha"]) ? $_POST["senha"] : "";

                // variável recebe os dados criptografados para vio em GET
                $return = base64_encode(implode(" - ", $return));

                header("location: addUser.php?user_data=".$return);
            
            }else {
                // colocando a primeira letra de cada nome em maiúscula
                $_POST["nome"] = ucwords($_POST["nome"]);

                // apagando elementos do array
                unset($_POST["action"]);
                unset($_POST["confirmarEmail"]);
                unset($_POST["confirmarSenha"]);

                $_POST["senha"] = sha1($_POST["senha"]);
                
        
                $resultado = inserir("usuarios", $_POST);

                if ($resultado){
                    
                    inserir("log", ["tipo" => "Inserção de Registro", "conteudo" => "O usuário ".$_POST['nome']." foi cadastrado."]);

                    header("location: login.php?msg=registered-user");

                } else {
                    echo "[ ERRO ] - Não foi possível inserir!";
                }                
            }
        }
    } 
?>