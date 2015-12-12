<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_tasks extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "tasks";
    return $table;
}

function get($order_by){
$this->db->order_by($order_by);
$query = $this->db->get('tasks');
return $query;
}


}