<?
	require_once('header.php');
?>

<div class="container">
	<div class="header">
		<div class="row">
			<?
				if ($showRegForm):
					showRegForm();
				elseif ($showSettingsForm):
					showSettingsForm();
				elseif ($showLoginForm):
					showLoginForm();
				elseif (isUserLoggedIn()):
					showGreetings($_SESSION['user']['login']);
				endif;
			?>
		</div>
	</div>
	
</div>	

<?
	require_once('footer.php');
?>