{% include 'parts/header.tpl' %}
<body>
	<h1>Отзывы — Страница администрирования</h1>
	<a href="/">Вернуться на главную</a><br>
	<button id="logout">Выйти из учётной записи</button>

	<div class="reviews">
		{% for review in reviews %}
			<div class="review-container">
				<div class="review-author">{{review.author}}</div>
				<div class="review-text">{{ review.text }}</div>
				<div class="review-controls">
					{% if review.status == 0 %}
						<button
							data-review-id={{review.id}}
							data-action-type="approve"
							class="js-review-action review-action-btn"
						>Одобрить</button>
					{% endif %}
					<button
						data-review-id={{review.id}}
						data-action-type="delete"
						class="js-review-action review-action-btn"
					>Удалить</button>
				</div>
			</div>
		{% endfor %}
	</div>
</body>
{% include 'parts/footer.tpl' %}