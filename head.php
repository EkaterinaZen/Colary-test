<!DOCTYPE html>
<html>
	<head>
		<title>Тестовый сайт</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="icon" type="image/png" href="images/favicon.png">
		<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.plugin.min.js"></script> 
		<script type="text/javascript" src="js/jquery.datepick.js"></script>
		<script src="js/init.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#day').datepick({dateFormat: 'mm/dd/yyyy', 
									defaultDate: '01/01/1990',
									selectDefaultDate: true,
									minDate: '01/01/1920',
									maxDate: '12/31/2016'
				});
			});	
		</script>
	</head>
	<body>