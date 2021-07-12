<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vending Machine</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel='stylesheet' type='text/css' href='css/styles7.css'>
	<?php 

		if ($indextitle === 'index') {
			echo "<script src='js/index.app.js' type='text/javascript' charset='utf-8' async defer></script>";
		} else if ($indextitle === 'home') {
			echo "<script src='js/home.app4.js' type='text/javascript' charset='utf-8' async defer></script>";
		} else if ($indextitle === 'owner') {
			echo "<script src='js/home.app4.js' type='text/javascript' charset='utf-8' async defer></script>";
		} else {
			return false;
		}

	?>
	
</head>