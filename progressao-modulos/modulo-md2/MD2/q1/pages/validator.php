<?php 

    if (isset($_POST["action"]) ){

        if ($_POST["action"] == "logar"){
                       
            $username["email"] = $_POST["email"];
            $username["senha"] = md5($_POST["senha"]);
 
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

            // ação caso as senhas sejam diferentes
            if ($_POST["senha"] != $_POST["confirmarSenha"]){

                // array criado para receber e carregar quando voltar para corrigir a senha
                $return["nome"] = $_POST["nome"];
                $return["email"] = $_POST["email"];

                // variável recebe os dados criptografados para vio em GET
                $return = base64_encode(implode(" - ", $return));

                header("location: addAdim.php?user_data=".$return);
            
            }else {
                // colocando a primeira letra de cada nome em maiúscula
                $_POST["nome"] = ucwords($_POST["nome"]);

                // apagando elementos do array
                unset($_POST["action"]);
                unset($_POST["confirmarSenha"]);

                $_POST["senha"] = md5($_POST["senha"]);
                $_POST["login"] = date("d/m/Y H:i:s");
        
                // Cria / abre o arquivo txt em uma variável
                $user = fopen("database.usuarios.txt", "a+");
        
                // escreve no arquivo txt (variável do arquivo, mensagem a escrever)
                fwrite($user, implode(" - ", $_POST).PHP_EOL);
        
                // fecha o arquivo txt
                fclose($user);

                header("location: ../index.php?msg=registered user");

            }
        }
    } 
?>