<?php
function isUserLoggedIn(){
    if(!empty($_SESSION['user']['login']))
        return true;
    else 
		return false;
}

function registerUser($login, $pass, $confirm, $email, $city, $sex, $birth){
    global $link, $status, $showRegForm, $showLoginForm;
    $sql = "SELECT * FROM `users` WHERE Login = '{$login}' LIMIT 1";
	$user = mysqli_fetch_assoc(mysqli_query($link, $sql));
	if (!preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email)) $status[] = 'Вы ввели некорректный e-mail';
	if ($pass != $confirm) $status[] = 'Пароли не совпадают';
	if (strlen($pass) < 5) $status[] = 'Пароль должен содержать не менее 5 символов';
	if (strlen($login) < 3) $status[] = 'Логин слишком короткий';
	if (strlen($login) > 15) $status[] = 'Логин слишком длинный';
	if (!empty($user['login'])) $status[] = 'Логин занят';
	
	if (!empty($status)){
		$showRegForm = true;
	} else {		
		$salt = stringGenerate();
		$salt = substr(strtr(base64_encode($salt), '+', '.'), 0, 22);
		$password = crypt($pass, '$2a$08$' . $salt);
		$birth = date_format(date_create($birth), 'Y-m-d');
		$sql = "INSERT INTO `users` (`login`, `password`, `email`, `city`, `gender`, `birth`)
			VALUES ('{$login}', '{$password}', '{$email}', '{$city}', '{$sex}', '{$birth}')";
		if(mysqli_query($link, $sql)){
            $status[] = 'Вы успешно зарегистрировались! Теперь Вы можете войти на сайт.<br/>';
			$showLoginForm = true;
		} else {
            $status = 'Ошибка при регистрации';
			$showRegForm = true;
        }
    }
}

function loginUser($login, $password){
    global $link; 
	$sql = "SELECT * FROM `users` WHERE `login` = '{$login}' LIMIT 1";
	$result = mysqli_query($link, $sql); 
    $user = mysqli_fetch_assoc($result);
	if($user['password'] == crypt($password, $user['password'])){
        $_SESSION['user'] = $user;
		if ($_POST['RememberMe']){
			$hash = md5(stringGenerate());
			$sql = "UPDATE users SET hash='".$hash."' WHERE Id='".$user['id']."'";
			$result = mysqli_query($link, $sql);
			setcookie("id", $user['id'], time()+60*60*24*30);
			setcookie("hash", $hash, time()+60*60*24*30);
		}
		return true;
	} else
        return false;
}

function loginByCookies(){
	global $link;
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
		$sql = "SELECT * FROM users WHERE Id = '".intval($_COOKIE['id'])."' LIMIT 1";
		$result = mysqli_query($link, $sql);
		$person = mysqli_fetch_assoc($result);
		if(($person['hash'] !== $_COOKIE['hash']) or ($person['id'] !== $_COOKIE['id'])){
			setcookie("id", "", time() - 3600*24*30*12, "/");
			setcookie("hash", "", time() - 3600*24*30*12, "/");
			$status[] = "Авторизация не удалась";
		} else
			$_SESSION['user'] = $person;
	}
}

function renewUser($id){
	global $link;
	$sql = "SELECT * FROM `users` WHERE `id` = '{$id}' LIMIT 1";
	$result = mysqli_query($link, $sql);	
    $user = mysqli_fetch_assoc($result);
	$_SESSION['user'] = $user;
}

function logoutUser(){
	session_destroy();
	$_SESSION = array();
	setcookie("id", "", time() - 3600*24*30*12, "/");
	setcookie("hash", "", time() - 3600*24*30*12, "/");	
    header("Refresh: 0; url=index.php");
}

function stringGenerate(){	
    $rand = array();
    for ($i = 0; $i < 8; $i += 1)
        $rand[] = pack('S', mt_rand(0, 0xffff));
    $rand[] = substr(microtime(), 2, 6);
    $string = sha1(implode('', $rand), true);
	return $string;
}

function cities(){
	global $link; 
	$cities = array();
    $sql = "SELECT * FROM `cities`"; 
    $result = mysqli_query($link, $sql); 
    while($row = mysqli_fetch_array($result))
        $cities[] = $row[1];
    return $cities;
}

function showRegForm(){
	global $status;
	require_once("regForm.php");
}	  
	  
function showLoginForm($login = '', $password = ''){
	if (!empty($_POST['login']))
		$login = $_POST['login'];
	if (!empty($_POST['password']))
		$password = $_POST['password'];
	require_once('loginForm.php');
}

function showSettingsForm(){
	require_once('settingsForm.php');
}

function showGreetings($login){
	echo "<div class='greetings col-lg-4 col-lg-offset-4'>
		<span>Добро пожаловать!</span><br />
		Вы вошли как $login
		<a href='?action=logout'> (Выйти)</a><br />
		<a href='?action=settings'> Личный кабинет</a><br />
	</div>";
}

function addAvatar(){
	global $link;
	if (is_uploaded_file($_FILES['avatar']['tmp_name'])){
		move_uploaded_file($_FILES['avatar']['tmp_name'], "images/".$_FILES['avatar']['name']);
		$sql = "UPDATE `users` SET `avatar` = '{$_FILES['avatar']['name']}' WHERE `id` = '{$_SESSION['user']['id']}'";
		if (mysqli_query($link, $sql))
			$_SESSION['user']['avatar'] = $_FILES['avatar']['name'];
	}
}

function deleteAvatar($login){
	global $link;
	$sql = "UPDATE `users` SET `avatar` = '' WHERE `login` = '{$login}'";
	$result = mysqli_query($link, $sql);
}
function userGender($login){
	global $link;
	$sql = "SELECT * FROM `users` WHERE `login` = '{$login}' LIMIT 1";
	$result = mysqli_query($link, $sql);
	$user = mysqli_fetch_assoc($result);
	return $user['gender'];
}
function updateUser(){
	global $link;
	$birth = date_format(date_create($_POST['birth']), 'Y-m-d');
	$sql = "UPDATE `users` SET `email` = '{$_POST['email']}', city` = '{$_POST['city']}', `gender` = '{$_POST['sex']}', `birth` = '{$birth}' WHERE `id` = '{$_SESSION['user']['id']}'";
	if (mysqli_query($link, $sql)){
		$_SESSION['user']['email'] = $_POST['email'];
		$_SESSION['user']['city'] = $_POST['city'];
		$_SESSION['user']['gender'] = $_POST['sex'];
		$_SESSION['user']['birth'] = $_POST['birth'];
	}
}