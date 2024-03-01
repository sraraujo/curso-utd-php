<?php

    function inserir($tabela, $dados){

        // lembrar de apagar - teste / retirar a imagem
        if (empty($dados["imagemLink"])){
            unset($dados["imagemLink"]);
        }

        if (isset($dados["codigo"])){
            // trecho para remover aspa simples do nome, pois não cadastra nomes, como: farinha d'água / M&M's
            $dados["nome"] = str_replace("'", "", $dados["nome"]);
        
            $dados["nome"] = ucwords($dados["nome"]);
            $dados["codigo"] = mb_strtoupper($dados["codigo"]);
        }

        // 1º parte da query
        $query = "INSERT INTO `$tabela` ";

        // 2° parte da query // transformar o array em estring e incluir na $query
        $campos = implode("`, `", array_keys($dados));
        $query .= "(`$campos`) ";

        // 3° parte // inserir os VALUES dna $query
        $valores = implode("', '", $dados);
        $query .= "VALUES ('$valores')";
        
        // echo $query;

        // var_dump($query);
        // die();        

        global $conexao;

        // enviando os dados para o BD
        $resultado = mysqli_query($conexao, $query) or die(mysqli_error(($conexao)));

        return $resultado;
    }

    
    // SELECT { * -> campos selecionados } FROM `tabela` WHERE `campo` = 'valor' ORDER BY ASC
    function selecionar($tabela, $campos, $filtros, $extra){

        $query = "SELECT  ";

        if (is_null($campos)){
            $query .= "* ";
        
        } else{
            foreach ($campos as $campo){
                $query .= "`$campo`, ";
            }

            // remove a última virgula
            $query = substr($query, 0, -2);
        }

        $query .= " FROM `$tabela` ";

        if (!is_null($filtros)){
            $query .= " WHERE ";

            foreach ($filtros as $campo=>$valor){
                $query .= " `$campo` = '$valor' AND";
            }

            // revome o último AND
            $query = substr($query, 0, -4);
        }

        if(!is_null($extra)){
            $query .= $extra;
        }

        // enviando os dados para o BD
        global $conexao;
        $resultado = mysqli_query($conexao, $query) or die(mysqli_error(($conexao)));

        $data = array();

        while ($linha = mysqli_fetch_assoc($resultado)){
            $data[] = $linha;
        }

        return $data;
    }


    // UPDATE `tableName` SET `campo` = 'newValor' WHERE `id` = 'idCampo'
    function atualizar($tabela, $dados, $filtro){

        $query = "UPDATE `$tabela` SET ";

        foreach ($dados as $key => $value){
            if($value != "CURRENT_TIMESTAMP"){
                $query .= "`$key` = '$value' AND ";

            }else{
                $value = str_replace("'", "", $value);
                $query .= "`$key` = ".$value." AND ";
            }
        }

        // removendo a última vírgula
        $query = substr($query, 0, -4 );

        $query .= " WHERE ";

        foreach ($filtro as $key => $value){
            $query .= "`$key` = '$value' AND ";
        }

        // removendo o último AND
        $query = substr($query, 0 , -4);

        // enviando os dados de atualização para o BD
        global $conexao;
        $resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

        return $resultado;
    }


    function deletar($tabela, $filtro){

        $query = "DELETE FROM `$tabela`";

        $query .= " WHERE ";

        foreach ($filtro as $key => $value){
            $query .= "`$key` = '$value' AND ";
        }

        // removendo o último AND
        $query = substr($query, 0 , -4);

        // enviando os dados de atualização para o BD
        global $conexao;
        $resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

        return $resultado;
    }

    // selecionar("produtos", ["nome", "id"], [`codigo` => "BR000000000001"]);
?> 