<?
include_once('config/config.php');



class M_User {

	function auth($login,$pass){
        // test::  login: user2. password: user2
        $pass = md5($pass);
        $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка при коннекте к бд');
        $sql = "select user.id_user,user_role.id_role AS id_role from user JOIN user_role ON user.id_user = user_role.id_user where user_login='$login' and user_password='$pass'";
        $res = mysqli_query($connect,$sql) or die("Error".mysqli_error($connect)); 
        if(mysqli_num_rows($res)) {
            $result = mysqli_fetch_assoc($res);

            setcookie("login",$login);
            setcookie("id_user",$result['id_user']);
            setcookie("usr_role",$result['id_role']);
            
            return true;
        } else {
           
            return false;}
       
    }
    function register($name,$login,$pass){
        $pass = md5($pass);
        $sql = "INSERT INTO user (`user_name`,`user_login`,`user_password`) VALUES('$name','$login','$pass')";
        $insertUser = db::getInstance()->Query($sql);
       
       
        
        if($insertUser){
        
            $sql1 = "SELECT id_user FROM user WHERE user_login='$login'";
            $uId = db::getInstance()->Select($sql1);
            $user_id = $uId[0]['id_user'];
            $sql2 = "INSERT INTO user_role(`id_user`,`id_role`) VALUES ('$user_id','0')";
            $insertRole = db::getInstance()->Query($sql2);
             if($insertRole){
                    echo "Данные успешно добавлены";
                    return true;
                }
            
        } else{
            return false;
        }
    }
    function getUserInfo($login){
        $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка при коннекте к бд');
        $sql = "select * from user where user_login='$login'";
        $res = mysqli_query($connect,$sql) or die("Error".mysqli_error($connect)); 
        $row = mysqli_fetch_assoc($res);
        return $row;
    }
}