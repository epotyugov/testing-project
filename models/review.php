<?php
require_once __DIR__ . '/common.php';

class ReviewModel extends CommonModel
{
	/** Минимальная длина имени автора отзыва */
	const AUTHOR_MIN_LENGTH = 3;
	/** Максимальная длина имени автора отзыва */
	const AUTHOR_MAX_LENGTH = 30;
	/** Максимальная длина отзыва */
	const REVIEW_MAX_LENGTH = 500;

	/** Статус отзыва - одобренный */
	const REVIEW_STATUS_APPROVED = 1;
	/** Статус отзыва - непроверенный */
	const REVIEW_STATUS_UNVERIFIED = 0;
	/** Статус отзыва - любой */
	const ANY_REVIEW_STATUS = [0, 1];

	public function __construct() {}

	/**
	 * Возвращает массив одобренных отзывов
	 * 
	 * @param array $reviewStatus статус возвращаемых отзывов
	 */
	public function getReviews($reviewStatus = [self::REVIEW_STATUS_APPROVED]): array
	{
		$placeholder = str_repeat("?,", count($reviewStatus) - 1) . "?";
		$query = self::getDbInstance()->prepare(
			"SELECT id, author, `text`, `status`
			FROM reviews
			WHERE `status` IN ($placeholder)
			ORDER BY `status` ASC"
		);
		$query->execute($reviewStatus);
		return $query->fetchAll(PDO::FETCH_ASSOC) ?: [];
	}

	/**
	 * Сохраняет отзыв
	 * 
	 * @param string $author имя автора отзыва
	 * @param string $review текст отзыва
	 */
	public function saveReview(string $author, string $review): bool
	{
		$query = self::getDbInstance()->prepare("INSERT INTO reviews(author, `text`, `status`) VALUES (?, ?, ?)");
		return $query->execute([
			$author,
			$review,
			self::REVIEW_STATUS_UNVERIFIED,
		]);
	}

	/**
	 * Обновляет статус отзыва
	 * 
	 * @param int $reviewId идентификатор отзыва
	 * @param int $updatedStatus новый статус отзыва
	 */
	public function updateReviewStatus(int $reviewId, int $updatedStatus): bool
	{
		$query = self::getDbInstance()->prepare("UPDATE reviews SET `status` = ? WHERE id = ?");
		return $query->execute([
			$updatedStatus,
			$reviewId,
		]);
	}

	/**
	 * Удаляет отзыв
	 * 
	 * @param int $reviewId идентификатор отзыва на удаление
	 */
	public function deleteReview(int $reviewId): bool
	{
		$query = self::getDbInstance()->prepare("DELETE FROM reviews WHERE id = ?");
		return $query->execute([$reviewId]);
	}

	/**
	 * Валидирует имя автора отзыва перед занесением в бд
	 * 
	 * @param mixed $var валидируемая переменная
	 */
	public function validateAuthor($var): bool
	{
		return isset($var)
			&& is_string($var)
			&& strlen($var) >= self::AUTHOR_MIN_LENGTH
			&& strlen($var) <= self::AUTHOR_MAX_LENGTH;
	}

	/**
	 * Валидирует имя автора отзыва перед занесением в бд
	 * 
	 * @param mixed $var валидируемая переменная
	 */
	public function validateReview($var): bool
	{
		return isset($var)
			&& is_string($var)
			&& strlen($var) <= self::REVIEW_MAX_LENGTH;
	}
}