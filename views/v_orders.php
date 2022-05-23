<? 
echo '<table border=1>';
echo '<tr style="background:grey;color:white">';
echo '<td>ID_ORDER</td>';
echo '<td>ID_USER</td>';
echo '<td>AMOUNT</td>';
echo '<td>DATE</td>';
echo '<td>STATUS</td>';
echo '</tr>';
foreach($goods as $row){
$id_order = $row["id_order"];
$id_user = $row["id_user"];
$amount = $row["amount"];
$date = $row["datetime_create"];
$status = $row["id_order_status"];
echo "<tr><td>$id_order</td><td>$id_user</td><td>$amount</td><td>$date</td><td><select id='$id_order' name='status'>";
if($status == 0){
    echo "<option value='0' selected>Не выполнен</option><option value='1'>Выполнен</option>";
}else {
    echo "<option value='0' >Не выполнен</option><option value='1' selected>Выполнен</option>";
}
echo '</select></td></tr>';


}
echo '</table>';
?>

<script>
    const changeVal = async (val,id) => {
        let response = await fetch(`index.php?c=admin&act=orderchange&status=${val}&id=${id}`);
        if(response) {
            let status = val == 0 ? 'Не выполнен' : 'Выполнен';
            alert('Статус обновлен на ' + status);
        } else {
            alert('Ошибка')
        }
    }
    let selectEls = document.querySelectorAll('select');
    selectEls.forEach(element => {
        element.addEventListener("change", ()=> {
    changeVal(element.value, element.id);
        })
    });
</script>