<?php

function edit_distance($t1,$t2){
    $at1 = str_split($t1);
    $at2 = str_split($t2);
    
    for($i=0;$i<=count($at1);$i++){
        $distancias[$i][0] = $i;
    }
    
    for($j=0;$j<=count($at2);$j++){
        $distancias[0][$j] = $j;    
    }
    
    for($i=1;$i<=count($at1);$i++){
        for($j=1;$j<=count($at2);$j++){
            if($at1[$i-1] == $at2[$j-1]){
                $n1 = $distancias[$i-1][$j-1];
                $n2 = ($distancias[$i-1][$j] + 1);
                $n3 = ($distancias[$i][$j-1] + 1);
                $distancias[$i][$j] = menor($n1,$n2,$n3);
            }else{
                $n1 = ($distancias[$i-1][$j-1] + 1);
                $n2 = ($distancias[$i-1][$j] + 1);
                $n3 = ($distancias[$i][$j-1] + 1);
                $distancias[$i][$j] = menor($n1,$n2,$n3);
            }
            
        }    
    }
    return $distancias[count($at1)][count($at2)];
}

function menor($n1,$n2,$n3){
    $numeros = array($n1,$n2,$n3);
     foreach($numeros as $numero){
            if(!isset($menor)){
                $menor = $numero;
            }elseif($menor > $numero){
                $menor = $numero;
            }
     }
     return $menor;
}

echo "La distancia entre los strings es: ".edit_distance("Clumbia","Colombia");