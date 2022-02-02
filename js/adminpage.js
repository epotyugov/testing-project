document.addEventListener('DOMContentLoaded', () => {
	/**
	 * Авторизация
	 */
	document.getElementById('authform')?.addEventListener('submit', event => {
		event.preventDefault();
		$.ajax({
			url: 'ajaxHandler.php?controller=Adminpage&action=attemptAuthentication',
			type: 'post',
			data: {
				login: document.getElementById('login')?.value,
				password: document.getElementById('password')?.value,
			},
		}).done(() => window.location.href = '/adminpage'
		).fail(() => alert('Введён неверный логин или пароль'));
	});

	/**
	 * Разавторизация
	 */
	document.getElementById('logout')?.addEventListener('click', () => {
		$.ajax({
			url: `ajaxHandler.php?controller=Adminpage&action=logout`,
			type: 'post',
		}).done(response => {
			if (response) {
				window.location.href ='/';
			} else {
				alert('Произошла ошибка');
			}
		});
	});

	/**
	 * Совершить действие над отзывом
	 */
	document.querySelectorAll('.js-review-action')?.forEach(elem => {
		elem?.addEventListener('click', () => {
			$.ajax({
				url: `ajaxHandler.php?controller=Adminpage&action=${elem.getAttribute('data-action-type')}Review`,
				type: 'post',
				data: {
					id: elem.getAttribute('data-review-id'),
				},
			}).done(response => {
				if (response) {
					alert('Действие над отзывом успешно произведено');
					location.reload();
				} else {
					alert('Произошла ошибка! Статус отзыва не был изменён');
				}
			});
		});
	});
});