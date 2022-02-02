<?php
require_once 'common.php';

class AuthenticationService extends CommonModel
{
	public function __construct() {}

	/**
	 * Проверка на наличие данных пользователя в БД
	 * 
	 * @param string $login Введённый логин
	 * @param string $password Введённый пароль
	 */
	public static function authenticate(string $login, string $password): bool
	{
		$query = self::getDbInstance()->prepare(
			"SELECT `login`, `password`
			FROM users
			WHERE `login` = ? AND `password` = ?
			LIMIT 1"
		);
		$query->execute([$login, $password]);
		return $query->rowCount() > 0;
	}
}