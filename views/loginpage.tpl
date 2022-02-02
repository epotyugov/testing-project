<html>
	{% include 'parts/header.tpl' %}
	<body>
		<h1>Отзывы — Авторизация</h1>

		<form id="authform">
			<input id="login" type="text" minlength="3" placeholder="Введите логин" required><br><br>
			<input id="password" type="password" minlength="3" placeholder="Введите пароль" required><br><br>
			<input type="submit" value="Авторизоваться">
		</form>
		<a href="/">Вернуться на главную</a>
	</body>
	{% include 'parts/footer.tpl' %}
</html>
