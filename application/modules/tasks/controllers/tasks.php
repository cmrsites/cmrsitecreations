<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends MX_Controller {

	public function index()
	{
				
		$this->load->model('mdl_tasks');
		$data['query'] = $this->mdl_tasks->get('priority');
		
		$data['module'] = "tasks";
		$data['view_file'] = "display";
		echo Modules::run('templates/two_col', $data);
		
	}
	
}