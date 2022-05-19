<?php
//
// ������� ���������� �����.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// ��������� ��������
	protected $content;		// ���������� ��������
    protected $keyWords;


     protected function before(){

		$this->title = 'mysite';
		$this->content = '';
		$this->keyWords="...";

	}
	
	//
	// ��������� �������� ��������
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content,'kw' => $this->keyWords);
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}
