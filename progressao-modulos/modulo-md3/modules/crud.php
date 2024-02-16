<?php

    function inserir($tabela, $dados){

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
            $query .= "`$key` = '$value', ";
        }

        // removendo a última vírgula
        $query = substr($query, 0, -2 );

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