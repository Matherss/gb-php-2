<?php

include_once('model/M_Basket.php');

class C_Basket extends C_Base
{

	
	public function action_addgood(){
        $id_user = $_COOKIE['id_user'];
        $id_good = $_GET['id'];
        $price = get_good_price($id_good);
		$this->title .= '::text';
		$res = add_good($id_user,$id_good,$price);
		if($res) {
			return true;
		}
	}
    public function action_index(){
		$this->title .= '::basket';
		$goods = get_basket();
		if(!$goods) {
			$this->content = $this->Template('views/v_basket.php', array('info' => 'Корзина пустая'));	
		} else {
		$this->content = $this->Template('views/v_basket.php', array('goods' => $goods));	
	}
	}
	public function action_order(){
        $id_user = $_GET['id'];
        $sum = $_GET['sum'];
		$res = order($id_user,$sum);
		if($res) {
			delAllFromBasket($id_user);
			return true;
		}
	}
	public function action_del(){
		$id_basket = $_GET['id'];
		$res = delFromBasket($id_basket);
		if ($res) {
		$this->action_index();
		}
	}

}