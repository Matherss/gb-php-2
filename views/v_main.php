<?php
session_start();
if($_SESSION['pages'] >= 5) {
	for ($i=1; $i<5; $i++)
	{
			$_SESSION['pages'][$i-1] = $_SESSION['pages'][$i];
	}
	$_SESSION['pages'][4] = $lp;
} else {
	$_SESSION['pages'][] = $lp;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" href="views/style.css" />
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Главная</a> | 
		
		<?php if($_COOKIE['login'] === null) {
			echo '<a href="index.php?c=user&act=auth">Login</a> | <a href="index.php?c=user&act=register">Register</a>';
		} else {
			echo '<a href="index.php?c=user&act=logout">exit</a> | <a href="index.php?c=user&act=user">user page</a> | <a href="index.php?c=basket&act=index">Корзина</a>';
		echo '(<span id="basket">'.$count.'</span> шт.)';
		}
		?>
		<?php if($_COOKIE['usr_role'] == 1) {
			echo ' | <a href="index.php?c=admin&act=index">admin</a>';
		}?>
		
		
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		footer
	</div>
</body>
</html>
