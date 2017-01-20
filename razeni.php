<style>
  td{
    padding: 10px;
  }
</style>
<?

function vypis_pole($p){
    ?><table><tr><td><?
      echo implode("</td><td>",$p);
    ?></td></tr></table><?
}

function bubblesort($p){
  for($i=0;$i<count($p)-1;$i++):
    for($j=0;$j<count($p)-$i-1;$j++):
        if($p[$j]>$p[$j+1]):
            $q = $p[$j];
            $p[$j] = $p[$j+1];
            $p[$j+1] = $q;
        endif;
    endfor;
  endfor;
  return $p;
}


function selectionsort($p){
    for($i=0;$i<count($p)-1;$i++):
        $nejmensi = $p[$i];
        $nejmensi_i = $i;
        for($j=$i+1;$j<count($p);$j++):
          if($p[$j]<$nejmensi):
            $nejmensi = $p[$j];
            $nejmensi_i = $j;
          endif;        
        endfor;

        $p[$nejmensi_i] = $p[$i];
        $p[$i] = $nejmensi;
    endfor;
    
    return $p;
}

$x = array(5,4,18,1,-2,6,12,4,6,7,2,10,13,9,-6,0,4,-9);

vypis_pole($x);
vypis_pole(selectionsort($x));

?>