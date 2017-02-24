<?php

vypis_matici(nacti_matici("m1"));

function nacti_matici($s){
    $o = file_get_contents("./data/$s.txt");
    $m = explode("\r\n",$o);
    //foreach($m as &$v) $v = explode(" ",$v);
    
    foreach($m as &$v) $v = explode(" ",$v);
    //foreach($m as $k => $v) $m[$k] = explode(" ",$v);
    
    return $m;
}

function vypis_matici($m){
    echo "<table>";
    foreach($m as $v)
      echo "<tr><td>".implode("</td><td>",$v)."</td></tr>"; 
    echo "</table>";
}

function secti_matice($a,$b){

}

?>