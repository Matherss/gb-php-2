<?php
//
// ����������� �������� ������.
//
include_once('model/M_User.php');

class C_User extends C_Base
{
	//
	// �����������.
	//
	
	public function action_auth(){
		$this->title .= '::Login';
        $user = new M_User();
		$info = "auth process";
        if($this->IsPost()){
            $login = strip_tags($_POST['login']);
			$pass = strip_tags($_POST['pass']);
            $info = $user->auth($login,$pass);
			if($info) {
				header('location:index.php');
			}else {
				echo '<script>alert("неверный пароль");</script>';
				$this->content = $this->Template('views/v_auth.php');
			}
		    
		}
		else{
		   $this->content = $this->Template('views/v_auth.php');
		}


	
	}
	public function action_register(){
		$this->title .= '::Reg';
        $user = new M_User();
		$info = "auth process";
        if($this->IsPost()){
			$name = strip_tags($_POST['name']);
            $login = strip_tags($_POST['login']);
			$pass = strip_tags($_POST['pass']);
            $info = $user->register($name,$login,$pass);
			if($info) {
				$user->auth($login,$pass);
				header('location:index.php');
			} else {
				echo "<script>alert('Такой логин уже зарегистрирован')</script>";
				$this->content = $this->Template('views/v_reg.php');
			}
		}
		else{
		   $this->content = $this->Template('views/v_reg.php');
		}


	
	}
	public function action_logout(){
	setcookie('login', null);
	setcookie("id_user",null);
	setcookie("usr_role",null);
	header('Location:index.php');
}
	public function action_user(){
		$login = $_COOKIE['login'];
		$this->title .= '::User Page';
		$user = new M_User();
		$info = $user->getUserInfo($login);
		$this->content = $this->Template('views/v_user.php', array('login' => $info['user_login'],'username' => $info['user_name']));
	}
	

}
