<?php

// 1 - Crie um algoritmo que gere 6 dezenas da mega sena;

    $megaSena = array();
    $auxiliar = 0;


    // o laço vai rodar até o array conter 6 números sem repetição
    while(count($megaSena) < 6){

        $numeroSorteado = rand(0, 99);

        // recebe o primeiro número sorteado
        if (count($megaSena) == 0){
            array_push($megaSena, $numeroSorteado);
        
        // a partir do segundo número sorteado será analisado o array
        } else{

            foreach($megaSena as $value){
                
                if ($numeroSorteado == $value){
                    $auxiliar++;
                }
            }

            if ($auxiliar == 0){
                array_push($megaSena, $numeroSorteado);
            }

            $auxiliar = 0;
        }
    }

    echo "1 - Crie um algoritmo que gere 6 dezenas da mega sena <br><br>";

    linha();

    foreach($megaSena as $key => $value){
        echo ($key+1)."º número: - $value <br>";
    }

// 2 - Crie um algoritmo que leia um array 5 posições e nesse array ele mostre o maior elemento e o menor.(Não use funções de array)<br><br>"

    $lista = array();
    $auxiliar = 0;


    // o laço vai rodar até o array conter 5 números sem repetição
    while(count($lista) < 5){

        $numeroSorteado = rand(10, 99);

        // recebe o primeiro número sorteado
        if (count($lista) == 0){
            array_push($lista, $numeroSorteado);
        
        // a partir do segundo número sorteado será analisado o array
        } else{

            foreach($lista as $value){
                
                if ($numeroSorteado == $value){
                    $auxiliar++;
                }
            }

            if ($auxiliar == 0){
                array_push($lista, $numeroSorteado);
            }

            $auxiliar = 0;
        }
    }

    $maior = 0;
    $menor = 0;

    linha();

    echo "2 - Crie um algoritmo que leia um array 5 posições e nesse array ele mostre o maior elemento e o menor.(Não use funções de array)<br><br>";

    foreach($lista as $key => $value){

        echo ($key+1)."º número: - $value <br>";

        if( $key ==0){
            $maior = $value;
            $menor = $value;
        
        } else {
            
            if ($value > $maior){
                $maior = $value;
            }

            if ( $value < $menor){
                $menor = $value;
            }
        }

    }

    echo "<br> Menor número é $menor <br> Maior número é $maior";

// 3 - Implemente um algoritmo que ordene um array de 10 posições. (Não use funções de array)

    


// 4 - Crie um algoritmo que verifique que uma palavra é palindroma.


// 5 - Crie um algoritmo onde seja possivel verificar o tipo de um triangulo.

$a = 8;
$b = 8;
$c = 8;

function eTriangulo($a, $b, $c){
    
    if ($a + $b > $c && $a + $c > $b && $b + $c > $a){
        return true;
    
    } else{

        return false;
    }
}


function tipoTriangulo($a, $b, $c){
    
    if ($a != $b && $a != $c && $b != $c){
        return 'Escaleno';
    
    } elseif ($a == $b && $a != $c || $a == $c && $c != $b || $b == $c && $b != $a){
        return 'Isósceles';
    
    } else{
        return 'Equilátero';
    }
}


function linha(){
    echo "<hr>";
}


linha();

echo "5 - Crie um algoritmo onde seja possivel verificar o tipo de um triangulo.<br><br>";

if (eTriangulo($a, $b, $c) == true){
    echo "Os lados A=$a B=$b C=$c formam um triângulo ".(mb_strtoupper(tipoTriangulo($a, $b ,$c))).".";

}else {
    echo "Os lados A=$a B=$b C=$c não formam um triângulo ";
}

linha();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício de Fixação</title>
</head>
<body>

</body>
</html> 