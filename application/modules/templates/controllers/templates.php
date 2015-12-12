<?php
class Templates extends MX_Controller 
{
	public function one_col($data){
		$this->load->view('one_col', $data);
	}
	
	public function two_col($data){
		$this->load->view('two_col', $data);
	}
	
	public function admin($data){
		$this->load->view('admin', $data);
	}

}