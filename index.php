<?php


spl_autoload_register(function ($class) {
    include 'controllers/' . $class . '.php';
});

//site.ru/index.php?act=auth&c=User;



switch ($_GET['c'])
{
	case 'articles':
		$controller = new C_Page();
	case 'basket':
		$controller = new C_Basket();
		break;
	case 'admin':
		$controller = new C_Admin();
		break;
	case 'user':
		$controller = new C_User();
		break;
	default:
		$controller = new C_Page();
}

$action = "action_";
$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';

$controller->Request($action);
