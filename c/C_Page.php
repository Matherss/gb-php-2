<?php
//
// ����������� �������� ������.
//
include_once('m/model.php');

class C_Page extends C_Base
{
	//
	// ��� ������������ � C_BASE, ������� ������ ����������� �� �������� ������
	//
	
	public function action_index(){
		$this->title .= '::text';
		$text = text_get();
		//$today = date();
		$this->content = $this->Template('v/v_index.php', array('text' => $text));	
	}
	
    
	public function action_edit(){
		$this->title .= '::edit';
		
		if($this->isPost())
		{
			text_set($_POST['text']);
			header('location: index.php');
			exit();
		}
		
		$text = text_get();
		$this->content = $this->Template('v/v_edit.php', array('text' => $text));		
	}
}
