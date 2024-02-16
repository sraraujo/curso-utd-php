<?php 

    require_once "../modules/conexao.php";
    include_once "../modules/crud.php";

    date_default_timezone_set("America/Fortaleza");

    if (isset($_POST["action"]) ){

        if ($_POST["action"] == "logar"){
                       
            $username["email"] = $_POST["email"];
            $username["senha"] = sha1($_POST["senha"]);
 
            // abrir o arquivo para verificar  os dados do usuário
            // $handle = fopen("database.usuarios.txt", "a+");
            $handle = file("database.usuarios.txt");

            foreach ($handle as $key => $data){
                // nome = $data[0] - email = $data[1] - senha = $data[2] - login: $data[3]

                // $data é uma linha/string sendo transformada em array
                $data = explode(" - ", $data);

                if ($username["email"] == $data[1] && $username["senha"] == $data[2]){

                    unset($username);

                    $username["nome"] = $data[0];
                    $username["email"] = $data[1];
                    $username["senha"] = $data[2];
                    $username["login"] = date("d/m/Y H:i:s");
                    
                    // abrindo e inserindo os dados em uam session
                    session_start();
                    $_SESSION[md5("user_name")] = $username;

                    // atualizando os dados e inserindo o novo login
                    $handle[$key] = implode(" - ", $username).PHP_EOL;
                    
                    // abrindo o arqivo e zerando para receber os novos dados
                    $updateArquivo = fopen("database.usuarios.txt", "w+");

                    // escrevendo os novos dados n o arquivo
                    fwrite($updateArquivo, implode("", $handle));

                    // fechando o arquivo tx
                    fclose($updateArquivo);

                    header("location: page-adim.php");
                }

                header("location: ../index.php?msg=user-null");
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

                    header("location: ../index.php?msg=registered-user");

                } else {
                    echo "[ ERRO ] - Não foi possível inserir!";
                }                
            }
        }
    } 
?>