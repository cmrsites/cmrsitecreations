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
	
	public function create(){
		$update_id =$this->uri->segment(3);
		
		if (is_numeric($update_id)) {
			$data = $this->get_data_from_db(update_id);
			$data['updat_id'] = $update_id;
		} else{
			$data = $this->get_data_from_post();
		}
		
		$data['module'] = "tasks";
		$data['view_file'] = "form2";
		echo Modules::run('templates/two_col', $data);
	}
	
	public function formsuccess(){
		$data['module'] = "tasks";
		$data['view_file'] = "formsuccess";
		echo Modules::run('templates/two_col', $data);
	}
	
	public function get_data_from_post(){
		$data['title'] = $this->input->post('title', TRUE);
		$data['priority'] = $this->input->post('priority', TRUE);
		return $data;
	}
	
	public function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);
		foreach($query->result() as $row) {
			$data['title'] = $row->title;
			$data['priority'] = $row->priority;	
		}
		return $data;
	}
	
	public function submit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('priority', 'Priority', 'required|numeric|xss_clean|max_length[2]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->create();
		}
		else
		{
			$data = $this->get_data_from_post();
			$this->db->insert(tasks, $data);
			redirect('tasks/formsuccess');
			
		}
	}
		

	
}