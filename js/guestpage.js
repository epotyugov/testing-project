document.addEventListener('DOMContentLoaded', () => {
	/**
	 * Подача формы с данными отзыва
	 */
	 document.getElementById('reviewform')?.addEventListener('submit', event => {
		event.preventDefault();
		$.ajax({
			url: 'ajaxHandler.php?controller=Guestpage&action=saveReview',
			type: 'post',
			data: {
				author: document.getElementById('author-input')?.value,
				review: document.getElementById('review-input')?.value,
			},
		}).done(response => {
			if (response) {
				alert('Отзыв успешно сохранён! После премодерации он появится на странице');
				window.location.href = '/';
			} else {
				alert('Произошла ошибка! Проверьте валидность имени автора и текста отзыва');
			}
		});
	});
});