<?php

$sql = "SELECT * FROM images";



// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();



// Подключение к бд
try {
  $dbh = new PDO('mysql:dbname=images;host=localhost', 'root', 'root');
  } catch (PDOException $e) {
  echo "Error: Could not connect. " . $e->getMessage();
  }
  // Установка error-режима
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(!$_GET['id']) {
  $sth = $dbh->query($sql);
  while ($row = $sth->fetchObject()) {
  $data[] = $row;
}
  }elseif($_GET['id']){
    $id = $_GET['id'];
    $sqlForOne = "SELECT * from images where id = $id";
    $sth = $dbh->query($sqlForOne);
    $data = $sth->fetchObject();
  }
unset($dbh);

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  if ($_GET['id']) {
    $template = $twig->loadTemplate('big.twig');
  } elseif(!$_GET['id']) {
  $template = $twig->loadTemplate('small.twig');
}
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  
  $content = $template->render(array(
    'images' => $data,
    'title' => 'Название сайтика',
  ));
  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>