<?php

include_once('model/model.php');

class C_Page extends C_Base
{

	
	public function action_index(){
		$this->title .= '::index';
		$goods = get_goods();
		$this->content = $this->Template('views/v_index.php', array('goods' => $goods));	
	}
	public function action_good(){
		$this->title .= '::good';
		$id_good = $_GET['id'];
		$good = get_good($id_good);
		$this->content = $this->Template('views/v_index.php', array('goods' => $good));	
	}
	
    
}
