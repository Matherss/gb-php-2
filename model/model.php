<?php
include_once('config/config.php');
function get_goods()
{

	try {
		$sql = "SELECT * FROM goods";
		$result = db::getInstance()->Select($sql);
		return $result;
	}
	catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
function get_good($id_good)
{
	try {
		$sql = "SELECT * FROM goods WHERE id_good=$id_good";
		$result = db::getInstance()->Select($sql);
		return $result;
	}
	catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

