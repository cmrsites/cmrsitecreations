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
		Modules::run('site_security/check_is_admin');
		$this->load->view('admin', $data);
	}

}