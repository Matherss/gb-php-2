<?php
session_start();?>
Логин:<strong> <?=$login?></strong><br>
Имя:<strong> <?=$username?></strong><hr>

Последние страницы: <br>

<?php
$arr = $_SESSION['pages'];
if(is_array($arr)){
    foreach($arr as $key => $value) {
        echo "<a href='$value'>страница #".++$key."</a><br>";
       }
       
}


