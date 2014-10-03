<?php

error_reporting(E_ALL); # Report all PHP errors
ini_set('display_errors',E_ALL | E_STRICT);

// Class that generates the passwort from the MySQL database that we created, either locally or via the hosting provider.
class Gen
{
	protected $db;

	public function Start($words, $numbers, $special, $uppercase) {
		
		//Replace your database settings
		$username="steph113_root";
		$password="45dLIKDU$=ah";
		$server="localhost";
		$database="steph113_online";
		
		//Open a PDO record class, database access
		try
		{
			$options = array(
				\PDO::ATTR_PERSISTENT => true
			);
			$this->db = new PDO("mysql:host=" . $server . ";dbname=" . $database, $username, $password, $options);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
		}
		catch(\PDOException $err)
		{
			echo 'Error: '.$err->getMessage();
		}
		
		//Initialize the random generator
		srand((double)microtime()*1000000);
		
		//the variable is declared as a string.
		$ret = (string)"";
		
		//Get count of words from database
		for ($i=1;$i<=$words;$i++) {
			
			//Select one record with random id
			$rw=(int)rand(1,478);
			
			try{
				//Build a SQL query
				$query = "SELECT *
						  FROM 
							`dictionary` 
						  WHERE  
							ID=" . $rw;
				$db_table = $this->db->prepare($query);
				$db_table->execute();
				if ($db_table->rowCount() == 0) return NULL;
				else{
					/*We get the value from the query. We then have the record in $res. */
					$res = $db_table->fetch(\PDO::FETCH_ASSOC);
					/*We combine the already initialized string with the field Keyword from $res in lowercase. */
					$ret.= strtolower($res['KeyWord']) . " ";
				}
			}
			catch(Exception $e){
				echo 'Fehler: '.$e->getMessage();
			}		
		}
		
		//Replace one char with a random number, $numbers is one input value of the function Start
		if ($numbers) {
			//One char from the whole string, we define a new variable $ac
			$ac=(int)rand(0,strlen($ret));
			//We get the ASCII value of the position of the string, $ac is the position, 1 is the length.
			$ac = ord(substr($ret,$ac,1));
			//we compare each value in $ret and check whether it is identical to $ac. If it is the same, we replace it with a random number.
			for ($i=0;$i<strlen($ret);$i++) {
				if (substr($ret,$i,1)==chr($ac)) {
					$ret=substr($ret,0,$i-1) . rand(0,9) . substr($ret,$i+1);
				}
			}
		}
		
		//Replace one char with a special char
		if ($special) {
			//Here we use a special char list and we may add other special chars later.
			$list="!#$%&'()*+,-<>@?=;:{[]}";
			$ac=(int)rand(0,strlen($ret));
			$ac = ord(substr($ret,$ac,1));
			for ($i=0;$i<strlen($ret);$i++) {
				if (substr($ret,$i,1)==chr($ac)) {
					$ret=substr($ret,0,$i-1) . substr($list,rand(0,23),1) . substr($ret,$i+1);
				}
			}
		}

		//Replace one char with uppercase
		if ($uppercase) {
			$ac=(int)rand(0,strlen($ret));
			$ac = ord(substr($ret,$ac,1));
			for ($i=0;$i<strlen($ret);$i++) {
				if (substr($ret,$i,1)==chr($ac)) {
					$ret=substr($ret,0,$i-1) . strtoupper(substr($ret,$i,1)) . substr($ret,$i+1);
				}
			}
		}

		return utf8_decode($ret);
		
	}
}