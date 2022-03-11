<?php 
/* Essai 1 
class Connexion {
	private $login;
	private $pass;
	private $connec;

	public function __construct($db, $login ='root', $pass='root'){
		$this->login = $login;
		$this->pass = $pass;
		$this->db = $db;
		$this->connexion();
	}

	private function connexion(){
		try
		{
	         $bdd = new PDO(
                            'mysql:host=localhost;dbname='.$this->db.';charset=utf8mb4', 
                             $this->login,
                             $this->pass
                 );
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->connec = $bdd;
		}
		catch (PDOException $e)
		{
			$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
			die($msg);
		}
	}

	public function q($sql,Array $cond = null){
		$stmt = $this->connec->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->closeCursor();
		$stmt=NULL;
	}


}
*/

/* Essai 2
*/
class Connexion{

private $host = 'localhost';
private $dbname = 'blog';
private $username = 'root';
private $password ='root';

public $con = '';

function __construct(){

    $this->connect();

}

function connect(){

    try{

        $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e){

        echo 'We\'re sorry but there was an error while trying to connect to the database';
        file_put_contents('connexion.errors.txt', $e->getMessage().PHP_EOL,FILE_APPEND);

    }
}
}
?>