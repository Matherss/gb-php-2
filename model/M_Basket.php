<?php
include_once('config/config.php');
function add_good($id_user,$id_good,$price)
{
    try {
		$sql = "INSERT INTO basket(`id_user`,`id_good`,`price`) VALUES('$id_user','$id_good','$price')";
		$result = db::getInstance()->Query($sql);
        return true;
	}
	catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
function get_good_price($id_good)
{
	try {
		$BD = new PDO("mysql:host=".SERVER.";port=3306;dbname=".DB,LOGIN,PASS);
		$sql = $BD->prepare("SELECT price FROM goods WHERE id_good= ?");
        $sql->execute(array("$id_good"));
        $value = $sql->fetch(PDO::FETCH_COLUMN);
		return $value;
	}
	catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
function get_basket(){
    try {
        $id_user = $_COOKIE['id_user'];
		$sql = "SELECT (SELECT goods.name FROM goods WHERE id_good=basket.id_good) AS good_name,id_good,price,id_basket FROM basket WHERE id_user=$id_user";
		$result = db::getInstance()->Select($sql);
		return $result;
    }
    catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
    }
}
function order($id_user,$sum){
    try {
		$sql = "INSERT INTO `orders`(`id_user`, `amount`, `id_order_status`) VALUES ('$id_user','$sum','0')";
		$result = db::getInstance()->Query($sql);
		return true;
    }
    catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
    }
}
function delFromBasket($id) {
    try {
    $sql = "DELETE FROM `basket` WHERE id_basket=$id";
    $result = db::getInstance()->Query($sql);
    return true;
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
}
function delAllFromBasket($id) {
    try {
        $sql = "DELETE FROM `basket` WHERE id_user=$id";
        $result = db::getInstance()->Query($sql);
        return true;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
function getBasketCount($id){
    try {
        $sql = "SELECT COUNT(*) FROM `basket` WHERE id_user=$id";
        $result = db::getInstance()->Select($sql);
        return $result;
    }  catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}