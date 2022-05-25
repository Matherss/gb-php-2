<? 
if($info) {
    echo $info;
}
if($goods) {
$sum;
$id_user = $_COOKIE['id_user'];
echo '<div id="goods">';
foreach($goods as $row){
    $name = $row["good_name"];
    $price = $row["price"];
    $id = $row["id_good"];
    $id_basket = $row["id_basket"];
    $category = $row["id_category"];
    echo "<div class='good' data-good='$id'>";
    echo "<div class='good_title'><a href='index.php?c=page&act=good&id=$id'>$name</a></div>";
    echo "<div class='good_price'>$price Руб.</div>";
    echo "<a href='index.php?c=basket&act=del&id=$id_basket'>Удалить из корзины</a>";
    echo "</div>";
    $sum+=$price;
}
echo '</div>';
echo 'Сумма заказа: ' .$sum.' Руб.<hr>';
echo "<button onclick='makeOrder()'>Оформить заказ</button>";
?>
<script>
    const makeOrder = async () => {
        let response = await fetch('index.php?c=basket&act=order&id=<?=$id_user?>&sum=<?=$sum?>');
        if(response) {
            alert('Заказ оформлен');
            document.location.reload();
            
        }
    }
</script>
<?php }?>