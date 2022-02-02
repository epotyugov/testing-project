<?php

class CommonModel
{
	private static $dbInstance;

	protected function __construct() {}

	/**
	 * Возвращает экземпляр соединения с БД
	 */
	protected static function getDbInstance()
	{
		if (!isset(self::$dbInstance)) {
			try {
/* 				$pdo = new PDO(
					"mysql:host=localhost;dbname=db",
					"admin",
					"admin",
				);
				$db = file_get_contents('data/db.sql');
				self::$dbInstance = $pdo->exec($db); */
				self::$dbInstance = new PDO(
					"mysql:host=localhost;dbname=db",
					"admin",
					"admin",
				);
			} catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
			
		}

		return self::$dbInstance;
	}

}

/* $db = new PDO($dsn, $user, $password);

$sql = file_get_contents('file.sql');

$qr = $db->exec($sql); */