<?php 
require('./config.php');
$limit = $_GET['limit'] ? $_GET['limit'] : 3;


$db = new PDO("pgsql:host=$db_host;dbname=$db_dbname", $db_user, $db_password);
$query = "SELECT * FROM goods LIMIT $limit";
$res = $db->query($query);
$limit = $limit + 3;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header{
            width: 100%;
            text-align: center;
            height: 3em;
            line-height: 3em;
            color: blue;
        }
        .items{
            width: 500px;
            margin: 0 auto;
          
            
        }
        .list-item{
            display: flex;
            justify-content: space-between;
        }
        button{
            width: 500px;
            }
    </style>
</head>
<body>
    <div class="header">Мышки</div>
    <div class="items">
        <?php
        while($row = $res->fetch()):?>
        
    <div class="list-item"><span><?=$row['title']?>(ID:<?=$row['id']?>)</span><span><?=$row['price']?> Руб.</span></div>
    <?php 
    endwhile;
    ?>
    <a href="./index-no-async.php?limit=<?=$limit?>">Ещё</a>
    </div>
</body>
</html>