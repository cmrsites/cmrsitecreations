<?php
class Store_items extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function get_data_from_post(){
	$data['item_name'] = $this->input->post('item_name', TRUE);
	$data['item_price'] = $this->input->post('item_price', TRUE);
	$data['item_description'] = $this->input->post('item_description', TRUE);
	return $data;
}

function create(){
	$item_id = $this->uri->segment(3);
	$data = $this->get_data_from_post();
	
	if ($item_id>0) {
		$data['headline'] = "Edit Item";
	} else {
		$data['headline'] = "Create New Item";
	}
	
	$current_url = current_url();
	$data['form_location'] = str_replace('/create', '/submit', $current_url);
	
	$flash = $this->session->flashdata('item');
	if ($flash!="") {
		$data['flash'] = $flash;
	}
	
	$templates = "admin";
	$data['view_file'] = "create";
	$this->load->module('templates');
	$this->load->templates->$templates($data);
}

function submit() {
	$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('item_name', 'Item Name', 'required');
		$this->form_validation->set_rules('item_price', 'Item Priace', 'is_numeric|required');
		$this->form_validation->set_rules('item_description', 'Item Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->create();
		}
		else
		{
			$data = $this->get_data_from_post();
			$data['item_url'] = url_title($data['item_name']);
			$this->_insert($data);
			
			//adding flashdata
			$value = "<p style='color: green;'>The item was successfully created.</p>";
			$this->session->set_flashdata('item', $value);
			
			$max_id = $this->get_max();
			redirect('store_items/create/'.$max_id);
		}
}

function manage(){
	$templates = "admin";
	$data['view_file'] = "manage";
	$this->load->module('templates');
	$this->load->templates->$templates($data);
}

function get($order_by){
$this->load->model('mdl_store_items');
$query = $this->mdl_store_items->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_store_items');
$query = $this->mdl_store_items->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_store_items');
$query = $this->mdl_store_items->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_store_items');
$query = $this->mdl_store_items->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_store_items');
$this->mdl_store_items->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_store_items');
$this->mdl_store_items->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_store_items');
$this->mdl_store_items->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_store_items');
$count = $this->mdl_store_items->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_store_items');
$max_id = $this->mdl_store_items->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_store_items');
$query = $this->mdl_store_items->_custom_query($mysql_query);
return $query;
}

}