<?php



function getGoods() {
$limit = $_GET['limit'] ? $_GET['limit'] : 3;
require('./config.php');
$db = new PDO("pgsql:host=$db_host;dbname=$db_dbname", $db_user, $db_password);
$query = "SELECT * FROM goods LIMIT $limit";
$res = $db->query($query);
while($row = $res->fetch()):?>
<?php echo '<div class="list-item"><span>'.$row['title'].'(ID:'.$row['id'].')</span><span>'.$row['price'].'Руб.</span></div>';
endwhile;
}
getGoods();
?>
