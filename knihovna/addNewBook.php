<?php

include '../_include/db.class.php';
Db::connect("localhost","root","","skola_knihovna");

class Kniha {
	public $nazev;
	public $autor;
	public $stran;
	public $jazyk;
	public $pocet;
	public $isbn;
	public $err = false;

	public function createFromPost()
	{
		$this->autor = $this->dbUpload("SELECT ID FROM autori WHERE (jmeno = '".$_POST['f_jmeno']."') AND (primeni = '".$_POST['f_primeni']."');")[0][0];

		var_dump($this->autor);
		if ($this->autor == NULL) {
			echo "Zadaný autor není v databázi".PHP_EOL;
			$this->autor = NULL;
			$err = true;
			return;
		}
		$this->nazev = $_POST['f_nazev'];
		$this->stran = $_POST['f_stran'];
		$this->jazyk = $_POST['f_jazyk'];
		$this->pocet = $_POST['f_pocet'];
		$this->isbn = $_POST['f_isbn'];
	}

	public function getInsert()
	{
		$sql = "INSERT INTO `knihy`(`ID`, `nazev`, `autor`, `stran`, `jazyk`, `pocet`, `isbn`)
		VALUES (NULL,'".$this->nazev."',".$this->autor.",".$this->stran.",".$this->jazyk.",".$this->pocet.",".$this->isbn.");";

		return $sql;
	}

	public function dbUpload($sql)
	{
		if ($this->err) return;
		return Db::queryall($sql);
	}
}

if (isset($_POST['f_nazev'])) {
	$kniha = new Kniha;
	$kniha->createFromPost();
	$sql = $kniha->getInsert();
	$kniha->dbUpload($sql);
	$err = false;
	if ($err) {$status=2;} else $status=1;
}

?>
<meta http-equiv="refresh" content="1;url=./newBook.php?s=<?php echo $status ?>">