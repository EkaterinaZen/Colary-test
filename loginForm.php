<?php
	echo '<form class="form-signin col-lg-4 col-lg-offset-4" role="form" action="?action=login" method="post">
        <h2 class="form-signin-heading">Авторизация</h2>
		<div class="form-group">
        <input type="text" class="form-control" placeholder="Логин" required autofocus name="login" value="'.$login.'">
        <input type="password" class="form-control" placeholder="Пароль" required name="password" value="'.$password.'">
		<div class="checkbox">
			<label><input type="checkbox" value="remember-me" name="RememberMe"><strong>Запомнить меня</strong></label>
		</div>
        </div>
		<div class="row">
			<div class="col-lg-6">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
			</div>
			<div class="col-lg-6">
				<a class="btn btn-lg btn-primary pull-right" href="?action=register">Регистрация</a>
			</div>
		</div>
	</form>';
?>