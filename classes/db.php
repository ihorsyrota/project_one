<?php
class DB {
	public $dbLink;
	
	public function __construct($dsn, $username, $password) {
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		); 

		try {
			$this->dbLink = new PDO($dsn, $username, $password, $options);
		}
		catch (PDOException $e) {
			die('Connection issue: ' . $e->getMessage());
		}

	}

	public function execute($query) {
		try {
			$result = $this->dbLink->query($query);
		}
		catch (PDOException $e) {
			die('query issue: ' . $e->getMessage());
			return false;
		}

		return $result;
	}

	public function close(){
		$this->dbLink = null;
	}

	function lastInsertId(){
		$id = $this->dbLink->lastInsertId();
			
		if (!$id) {
			return false;
		}

		return $id;
	}

}
?>