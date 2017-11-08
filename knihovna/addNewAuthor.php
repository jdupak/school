<?php

include '../_include/db.class.php';
Db::connect("localhost","root","","skola_knihovna");

class Autor {
	public $ID = null;
	public $jmeno;
	public $primeni;
	public $pohlavi;
	public $nazozeni;
	public $umrti;
	public $narodnost;
	public $popis;

	public function createFromPost()
	{
		$this->jmeno = $_POST['f_jmeno'];
		$this->primeni = $_POST['f_primeni'];
		$this->pohlavi = $_POST['f_pohlavi'];
		$this->nazozeni = $_POST['f_narozeni'];
		$this->umrti = $_POST['f_umrti'];
		$this->narodnost = $_POST['f_narodnost'];
		$this->popis = $_POST['f_popis'];
	}

	public function getInsert()
	{
		$sql = "INSERT INTO `autori`(`ID`, `jmeno`, `primeni`, `pohlavi`, `nazozeni`, `umrti`, `narodnost`, `popis`)
		VALUES (NULL,'".$this->jmeno."','".$this->primeni."',".$this->pohlavi.",".$this->nazozeni.",".$this->umrti.",".$this->narodnost.",'".$this->popis."');";

		return $sql;
	}

	public function dbUpload($sql)
	{
		return Db::queryall($sql);
	}
}

if (isset($_POST['f_jmeno'])) {
	$autor = new Autor;
	$autor->createFromPost();
	$sql = $autor->getInsert();
	$autor->dbUpload($sql);
	if ($err) {$status=2;} else $status=1;
}
?>
<meta http-equiv="refresh" content="1;url=./newAuthor.php?s=<?php echo $status ?>">