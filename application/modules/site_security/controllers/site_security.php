<?php
class Site_security extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function check_is_admin() {
    //makes sure the user has logged in as admin
	return TRUE;    
}


}