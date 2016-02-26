<?php
	echo '<div class="col-lg-4"></div><div class="col-lg-4" style="padding-top:20px">';
		if (!empty($_SESSION['user']['avatar']))
			echo '<div class="text-center"><div class="over-img"><img class="img-thumbnail" src="images/'.$_SESSION['user']['avatar'].'" style="max-width:200px;" /><a href="?action=clear" class="close">X</a></div></div><br />';
		else
			echo '<img class="img-thumbnail center-block" src="images/default_'.$_SESSION['user']['gender'].'.png" style="max-width:200px;" /><br />';	
			echo '<form role="form" action="?action=settings" enctype="multipart/form-data" method="post">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8 form-group text-center">
					<span class="btn btn-primary btn-file btn-block">
						<i class="icon-plus"> </i><span>Выберите файл</span>
						<input type="file" name="avatar" id="image" />
					</span>
				</div>
			<button type="submit" class="btn btn-primary btn-block" style="margin-bottom:17px">Загрузить</button></form>';
		echo '<form role="form" action="?action=settings" method="post">
		<label>Электронный адрес</label>
			<input type="text" class="form-control" placeholder="example@email.com" value="'.$_SESSION['user']['email'].'" name="email" /><br />
		<label>Пол</label>
		<div class="row">
					<div class="col-lg-7 col-lg-offset-1">
						<label class="radio">
							<input type="radio" name="sex" value="male"';
								if ($_SESSION['user']['gender'] == 'male')
								echo 'checked';
								echo ' />Мужской&nbsp&nbsp
						</label>
					</div>
					<div class="col-lg-7 col-lg-offset-1">
						<label class="radio">
							<input type="radio" name="sex" value="female"';
								if ($_SESSION['user']['gender'] == 'female')
								echo 'checked';
								echo ' />Женский<br />
						</label>
					</div>
		</div>		
		<div class="form-group">
			<label>Город</label>
			<select class="form-control" name="city">'; 
			foreach (cities() as $city){
				echo '<option value="'.$city.'"';
					if ($_SESSION['user']['city'] == $city)
						echo 'selected';
						echo '>'.$city.'</option>';
			}		
			echo '</select><br />
		<label>Дата рождения</label>
		<input class="form-control" type="text" name="birth" id="day" value="'.date("m/d/Y", strtotime($_SESSION['user']['birth'])).'"><br />
		</div>
		<button type="submit" class="btn btn-primary btn-block">Сохранить</button>
		</form>
		</div>';