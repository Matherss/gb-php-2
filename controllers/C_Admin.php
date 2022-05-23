<?php

include_once('model/M_Admin.php');

class C_Admin extends C_Base
{


    public function action_index(){
        $admin = new M_Admin();
		$this->title .= '::admin';
		$goods = $admin->get_orders();
		$this->content = $this->Template('views/v_orders.php', array('goods' => $goods));	
	}

    public function action_orderchange(){
        $status = $_GET['status'];
        $id = $_GET['id'];
        $admin = new M_Admin();
		$this->title .= '::admin';
		$res = $admin->order_change($status, $id);
		if($res) {
            return true;
        }
	}

}