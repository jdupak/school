<!-- øešení kv rce -->

<form action="./index.php" method="get">
  <input id="a" name="a"> x^2 +
  <input id="b" name="b"> x +
  <input id="c" name="c">
  <input type="submit" value="Send">
</form>  
<?php
  $a = $_GET["a"];
  $b = $_GET["b"];
  $c = $_GET["c"];  

  $d = ($b*$b)-(4*$a*$c);
  $sqroot_d = sqrt($d);
  $x1 = (0-$b+$sqroot_d)/(2*$a);
  $x2 = (0-$b-$sqroot_d)/(2*$a);
  if  ($d<0)
    {
    echo "Nemá øešení";
    }
  elseif ($d==0)
    {
    echo "x1 = ".$x1."<br>\n";
    }
  else
    {    
    echo "x1 = ".$x1."<br>\n";
    echo "x2 = ".$x2."<br>\n";
    };

?>