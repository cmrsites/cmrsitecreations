<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nofun extends MX_Controller {

	public function index()
	{
		
		echo '<h1>This is no fun at all?</h1>';
	}
	
	public function sayhello($firstname, $lastname){
		echo "Hello what's up $firstname $lastname?";
	}
}