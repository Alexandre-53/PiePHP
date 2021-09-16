<?php 
 
 namespace Core;

 use \PDO;
 use \Core\Core;
 
class Database 
{

	private static $pdo = null;

	private static function connect()
	{
			$dbcon = new \PDO("mysql:host=localhost;dbname=cinema", "root","mot_de_passe");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$pdo = $dbcon;
	}
	public static function getInstance(){
		if(self::$pdo === null){ // si vaut null alors on connect
			self::connect();
		}
		return self::$pdo; // on return la connection
	}
}
