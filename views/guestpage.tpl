{% include 'parts/header.tpl' %}
<body>
	<h1>Отзывы — Гостевая страница</h1>
	<a href="/loginpage">Войти в систему</a>

	<form id="reviewform">
		<h2>Оставить отзыв</h2>
		<input id="author-input" type="text" minlength="3" maxlength="30" placeholder="Введите имя" required><br><br>
		<textarea id="review-input" maxlength="500" placeholder="Введите отзыв" form="reviewform" required></textarea><br><br>
		<input type="submit" value="Оставить отзыв">
	</form>
	<hr>
	<div class="reviews">
		{% for review in reviews %}
			<div class="review-container">
				<div class="review-author">{{review.author}}</div>
				<div class="review-text">{{ review.text }}</div>
			</div>
		{% endfor %}
	</div>
</body>
{% include 'parts/footer.tpl' %}