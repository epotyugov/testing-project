<?php
require_once __DIR__ . '/../vendor/autoload.php';

class CommonController
{
	/** Объект окружения шаблонизатора */
	private $twig;
	/** Данные для передачи в шаблон */
	protected $templateData;

	public function __construct()
	{
		$loader = new \Twig\Loader\FilesystemLoader('views');
		$this->twig = new \Twig\Environment($loader);
	}

	/**
	 * Рендерит страницу
	 */
	protected function renderTemplate(string $templateName)
	{
		echo $this->twig->render($templateName, $this->templateData);
	}

	/**
	 * Возвращает строку в формате JSON
	 */
	protected function returnJSON($var): string
	{
		$result = json_encode($var);
		header('Content-Type: application/json; charset=utf-8');
		print($var);
		return $result;
	}
}