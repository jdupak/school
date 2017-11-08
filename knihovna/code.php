<?php 
	include '../_include/db.class.php';
	Db::connect("localhost","root","","skola_knihovna");

	// class Data class Autor {
	// 	public $data = array();
	// 	public $table;

	// 	public function createFromPost()
	// 	{
	// 		$this->data['ID'] = NULL;
	// 		foreach ($_POST as $key => $value) {
	// 			if (substr($key,0,2) == "f_") {
	// 				$key = str_replace("f_","",$key);
	// 				$this->data[$key] = $value;
	// 			}
	// 		}
	// 	}

	// 	public function getInsert()
	// 	{
	// 		$sql = "INSERT INTO ".$this->table."(`";
	// 		$sql .= implode('`,`', $this->data);
	// 		$sql .= "`) VALUES (";
	// 		foreach ($this->data as $key => $value) {
	// 			if (!is_numeric($value)) {
	// 				$value = "'".$value."'";
	// 			} 
	// 		}
	// 		$sql .= implode(',', $this->data);
	// 		$sql .= ")";

	// 		return $sql;
	// 	}

	// 	public function dbUpload($sql)
	// 	{
	// 		return Db::queryall($sql);
	// 	}
	// }

	class Kniha {
	public $ID = NULL;
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

	public function loadFromDb()
	{
		$array = $this->db("SELECT * FROM knihy WHERE ID = ".$this->ID)[0];
		$arrayAuthor = $this->db("SELECT jmeno,primeni FROM autori WHERE ID = ".$array['autor'])[0];
		$this->nazev = $array['nazev'];
		$this->stran = $array['stran'];
		$this->jazyk = $array['jazyk'];
		$this->pocet = $array['pocet'];
		$this->isbn = $array['isbn'];
		$this->jmeno = $arrayAuthor['jmeno'];
		$this->primeni = $arrayAuthor['primeni'];
	}

	public function getInsert()
	{
		$sql = "INSERT INTO `knihy`(`ID`, `nazev`, `autor`, `stran`, `jazyk`, `pocet`, `isbn`)
		VALUES (NULL,'".$this->nazev."',".$this->autor.",".$this->stran.",".$this->jazyk.",".$this->pocet.",".$this->isbn.");";

		return $sql;
	}

	public function getUpdate()
	{
		$sql = "UPDATE `knihy` SET `nazev`=".$this->nazev.", `stran`=".$this->stran.", `jazyk`=".$this->jazyk.", `pocet`=".$this->pocet.", `isbn`=".$this->isbn." WHERE ID = ".$this->ID;
		return $sql;
	}

	public function db($sql)
	{
		if ($this->err) return;
		return Db::queryall($sql);
	}
}
 ?>