<?php
loginByCookies();
if(isUserLoggedIn()){
	if(!empty($_SESSION))
		renewUser($_SESSION['user']['id']);
	switch($_GET['action']){	
		case 'logout':
			logoutUser();
			break;	
		case 'settings':
			if (isUserLoggedIn()){
				if (!empty($_POST)){
					updateUser();					
					header("Refresh: 0; url=index.php");					
				} elseif (!empty($_FILES))
					addAvatar();
				$showSettingsForm = true;
			}
			break;
		case 'clear':
			if(!empty($_SESSION)){
				deleteAvatar($_SESSION['user']['login']);
				header("Refresh: 0; url=index.php?action=settings");
			}
			break;
		default:
			break;		
    }
} else {
    switch($_GET['action']){
		case 'register': 
            if(!empty($_POST)){
                registerUser($_POST['login'],
                    $_POST['password'], $_POST['confirm_password'], $_POST['email'], $_POST['city'], $_POST['sex'], $_POST['birth']);
			} else {
                $showRegForm = true;
			}
            break;
        case 'login':
            if(!empty($_POST)){
				if (loginUser($_POST['login'], $_POST['password'])){					
					header("Refresh: 0; url=index.php");
				} else {
					$status[] = 'Неверный логин или пароль!';
					$showLoginForm = true;
				}
			} else {
                $showLoginForm = true;
            }
            break;
		default:
			$showLoginForm = true;
			break;
    }
}