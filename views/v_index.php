<? 
echo '<div id="goods">';
foreach($goods as $row){
    $name = $row["name"];
    $price = $row["price"];
    $id = $row["id_good"];
    $category = $row["id_category"];
    echo "<div class='good' data-good='$id'>";
    echo "<div class='good_title'><a href='index.php?c=page&act=good&id=$id'>$name</a></div>";
    echo "<div class='good_price'>$price Руб.</div>";
    // Если пользователь залогинился - он может добавлять в свою корзину товары
    if($_COOKIE['login']) {
        echo "<div><a onclick='addToCart($id)'>Добавить в корзину</a></div>";
    }
    echo "</div>";
}
echo '</div>';
?>

<script>
    const basket = document.getElementById('basket');
    const addToCart = async (id) => {
        let response = await fetch(`index.php?c=basket&act=addgood&id=${id}`);
        if(response) {
            alert('Товар добавлен');
            basket.innerText = +basket.innerText + 1;
        }
    }
</script>
<style>
    a {
        cursor:pointer;
    }
</style>