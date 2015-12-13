<?php
class Dashboard extends MX_Controller 
{

function __construct() {
parent::__construct();
}
function home(){
	$templates = "admin";
	$data['view_file'] = "home";
	$this->load->module('templates');
	$this->load->templates->$templates($data);
}


}