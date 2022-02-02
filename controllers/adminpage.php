<?php
require_once 'common.php';
require_once __DIR__ . '/../models/review.php';
require_once __DIR__ . '/../models/authentication.php';

class AdminpageController extends CommonController
{
	private ReviewModel $ReviewModel;

	public function __construct()
	{
		parent::__construct();
		$this->ReviewModel = new ReviewModel();
	}

	public function index()
	{
		$this->templateData = [
			'pagename' => 'adminpage',
		];

		if (!$this->isUserAuthenticated()) {
			$this->templateData['pageTitle'] = 'Модуль отзывов — Авторизация';
			$this->renderTemplate('loginpage.tpl');
			exit();
		}

		$this->templateData['pageTitle'] = 'Модуль отзывов — Страница администрирования';
		$this->templateData['reviews'] = $this->ReviewModel->getReviews(ReviewModel::ANY_REVIEW_STATUS);
		$this->renderTemplate('adminpage.tpl');
	}

	/**
	 * Ajax-метод для одобрения отзыва
	 */
	public function approveReview()
	{
		$this->returnJSON(
			$this->isUserAuthenticated(true)
			&& isset($_POST['id'])
			&& $this->ReviewModel->updateReviewStatus($_POST['id'], ReviewModel::REVIEW_STATUS_APPROVED)
		);
	}

	/**
	 * Ajax-метод для удаления отзыва
	 */
	public function deleteReview()
	{
		$this->returnJSON(
			$this->isUserAuthenticated(true)
			&& isset($_POST['id'])
			&& $this->ReviewModel->deleteReview($_POST['id'])
		);
	}

	/**
	 * Ajax-метод для авторизации пользователя
	 */
	public function attemptAuthentication()
	{
		session_start();
		$authenticationResult = $_POST['login'] && $_POST['password'] && AuthenticationService::authenticate($_POST['login'], $_POST['password']);
		if ($authenticationResult) {
			$_SESSION['authenticated'] = true;
		}
		$this->returnJSON($authenticationResult);
	}

	/**
	 * Ajax-метод для выхода из учётной записи
	 */
	public function logout()
	{
		session_start();
		$_SESSION['authenticated'] = false;
		$this->returnJSON(true);
	}

	/**
	 * Проверяет был ли авторизован пользователь
	 */
	private function isUserAuthenticated(bool $fromAjax = false): bool
	{
		if ($fromAjax) {
			session_start();
		}
		return $_SESSION['authenticated'] ?: false;
	}
}