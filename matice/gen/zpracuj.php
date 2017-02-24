<?
$o = implode("/",$_POST);
file_put_contents("./data.csv",$o);

header("Location: ./formular.php");

?>