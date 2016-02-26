<?
	require_once('header.php');
?>

<?if(isUserLoggedIn()):?>
	<p class="text access">Этот текст только для юзеров</p>
<?else:?>
	<p class="text restricted">Вам сюда нельзя</p>
<?endif;?>

<?
	require_once('footer.php');
?>