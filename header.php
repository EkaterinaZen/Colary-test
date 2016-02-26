<?
ob_start();

require_once('config.php');

session_start();
$link = mysqli_connect($hostname, $user, $pass, $db)
or die("Не могу подключиться к базе данных! Причина:".mysqli_error($link));
mysqli_query($link, "set names 'utf8'");

require_once('functions.php'); 
require_once('head.php');
require_once('authorization.php');

global $status;
?>

<div class="pages row">
	<div class="col-xs-1 col-xs-offset-1 test">Тестовый сайт</div>
	<a href="/"><div class="col-xs-1 col-xs-offset-6 btn">Главная</div></a>
	<a href="/page1.php"><div class="col-xs-1 btn">Страница 1</div></a>
	<a href="/page2.php"><div class="col-xs-1 btn">Страница 2</div></a>
</div>