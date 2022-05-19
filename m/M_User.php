<?
include_once('config/config.php');



class M_User {

	function auth($login,$pass){
        // test::  login: user2. password: user2
        $pass = md5($pass);
        $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка при коннекте к бд');
        $sql = "select id_user from user where user_login='$login' and user_password='$pass'";
        $res = mysqli_query($connect,$sql) or die("Error".mysqli_error($connect)); 
        if(mysqli_num_rows($res)) {
            setcookie("login",$login);
            return true;
        } else {
           
            return false;}
       
    }
    function register($name,$login,$pass){
        $pass = md5($pass);
        $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка при коннекте к бд');
        $sql = "INSERT INTO user (`user_name`,`user_login`,`user_password`) VALUES('$name','$login','$pass')";
        
        
        if (!$connect) {
          die("Ошибка: " . mysqli_connect_error());
        }
        if(mysqli_query($connect, $sql)){
            echo "Данные успешно добавлены";
            return true;
        } else{
            return false;
        }
        mysqli_close($connect);
    }
    function getUserInfo($login){
        $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка при коннекте к бд');
        $sql = "select * from user where user_login='$login'";
        $res = mysqli_query($connect,$sql) or die("Error".mysqli_error($connect)); 
        $row = mysqli_fetch_assoc($res);
        return $row;
    }
}