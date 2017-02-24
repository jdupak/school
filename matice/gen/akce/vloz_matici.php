<?
file_put_contents("../../$_POST[soubor].csv",$_POST[matice]);

header("Location: ../vlozit_matici.php");
?>