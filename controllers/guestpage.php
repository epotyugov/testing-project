<?php
require_once __DIR__ . '/../controllers/common.php';
require_once __DIR__ . '/../models/review.php';

class GuestpageController extends CommonController
{
	private $ReviewModel;

	public function __construct()
	{
		parent::__construct();
		$this->ReviewModel = new ReviewModel();
	}

	public function index()
	{
		$this->templateData = [
			'pageTitle' => 'Модуль отзывов — Гостевая страница',
			'pagename' => 'guestpage',
			'reviews' => $this->ReviewModel->getReviews(),
		];

		$this->renderTemplate('guestpage.tpl');
	}

	/**
	 * Ajax-метод для сохранения отзыва
	 */
	public function saveReview()
	{
		$this->returnJSON(
			$this->ReviewModel->validateAuthor($_POST['author'])
			&& $this->ReviewModel->saveReview($_POST['author'], $_POST['review'])
			&& $this->ReviewModel->validateReview($_POST['review'])
		);
	}
}
