<?php
include_once('model/M_Basket.php');
abstract class C_Base extends C_Controller
{
	protected $title;		// ��������� ��������
	protected $content;		// ���������� ��������
    protected $keyWords;
	protected $lastPage;
	

     protected function before(){

		$this->title = 'mysite';
		$this->content = '';
		$this->keyWords="...";
		$this->lastPage =$_SERVER['REQUEST_URI'];
		db::getInstance()->Connect();

	}
	
	//
	// ��������� �������� ��������
	//	
	public function render()
	{
		if($_COOKIE['id_user']){
			$id_user = $_COOKIE['id_user'];
			$basketCount = getBasketCount($id_user)[0]['COUNT(*)'];
		}
		$vars = array('title' => $this->title, 'content' => $this->content,'kw' => $this->keyWords, 'lp' => $this->lastPage,'count' => $basketCount);
		$page = $this->Template('views/v_main.php', $vars);				
		echo $page;
	}	
}
