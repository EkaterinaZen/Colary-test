<?php
	echo '<div class="col-lg-4"></div>
		<form class="form-signin col-lg-4" role="form" style="margin:0 auto" action="?action=register" method="post">
	    <h2 class="form-signin-heading">Регистрация</h2>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Логин" required autofocus name="login" value="'.$_POST['login'].'" />
			<input type="password" class="form-control" placeholder="Пароль" required name="password" />
			<input type="password" class="form-control" placeholder="Повторите пароль" name="confirm_password" style="margin-bottom:17px"/>
			<label>Электронный адрес</label>
			<input type="text" class="form-control" placeholder="example@email.com" value="'.$_POST['email'].'" name="email" /><br />
			<label>Пол</label>
			<div class="row">
				<div class="col-lg-7 col-lg-offset-1">
					<label class="radio">
						<input type="radio" name="sex" value="male" ';
						if ($_POST['sex'] == 'male')
						echo 'checked';
						echo ' />Мужской
					</label>
				</div>
				<div class="col-lg-7 col-lg-offset-1">
					<label class="radio">
						<input type="radio" name="sex" value="female" ';
						if ($_POST['sex'] == 'female')
						echo 'checked';
						echo ' />Женский
					</label>
				</div>
			</div>	
			<label>Город</label>
			<select class="form-control" name="city">'; 
			foreach (cities() as $city){
				echo '<option value="'.$city.'"';
					if ($_POST['city'] == $city)
						echo 'selected';
						echo '>'.$city.'</option>';
			}		
			echo '</select><br />
			<label>Дата рождения</label><input class="form-control" type="text" name="birth" id="day" value="'.date("m/d/Y", strtotime($_POST['birth'])).'" /><br />
		</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
	</form><div class="col-lg-4" style="padding-top:59px;">';
	foreach ($status as $s)
		echo '<div class="status text-primary bg-info" style="margin-top:5px;">' . $s . '<span class="close">X</span></div>';
	echo '</div>';
?>