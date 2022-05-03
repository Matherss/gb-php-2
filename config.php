<?php
const SERVER = 'localhost';
const DB = 'images';
const LOGIN = 'root';
const PASS ='root';

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка при коннекте к бд');