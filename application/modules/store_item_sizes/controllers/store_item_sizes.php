<?php

class Store_item_sizes extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function _display_options_so_far($item_id){
        $data['query'] = $this->get_where_custom('item_id', $item_id);
        $this->load->view('options_so_far', $data);
    }

    function ditch($update_id){
        $item_id = $this->uri->segment(4);
        $this->_delete($update_id);
        redirect('store_item_sizes/update/'.$item_id);

    }

    function update($item_id)
    {
        $submit = $this->input->post('submit', TRUE);
        $item_size = trim($this->input->post('item_size', TRUE));

        if ($submit=="Cancel"){
            redirect('store_items/create/'.$item_id);
        }

        if (($submit=="Submit") && ($item_size!="")){
            $data['item_id'] = $item_id;
            $data['item_size'] = $item_size;
            $this->_insert($data);
        }

        $data['form_location'] = current_url();
        $data['item_id'] = $item_id;
        $templates = "admin";
        $data['view_file'] = "update";
        $this->load->module('templates');
        $this->templates->$templates($data);
    }


    function get($order_by)
    {
        $this->load->model('mdl_store_item_sizes');
        $query = $this->mdl_store_item_sizes->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $this->load->model('mdl_store_item_sizes');
        $query = $this->mdl_store_item_sizes->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $this->load->model('mdl_store_item_sizes');
        $query = $this->mdl_store_item_sizes->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $this->load->model('mdl_store_item_sizes');
        $query = $this->mdl_store_item_sizes->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_store_item_sizes');
        $this->mdl_store_item_sizes->_insert($data);
    }

    function _update($id, $data)
    {
        $this->load->model('mdl_store_item_sizes');
        $this->mdl_store_item_sizes->_update($id, $data);
    }

    function _delete($id)
    {
        $this->load->model('mdl_store_item_sizes');
        $this->mdl_store_item_sizes->_delete($id);
    }

    function count_where($column, $value)
    {
        $this->load->model('mdl_store_item_sizes');
        $count = $this->mdl_store_item_sizes->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $this->load->model('mdl_store_item_sizes');
        $max_id = $this->mdl_store_item_sizes->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $this->load->model('mdl_store_item_sizes');
        $query = $this->mdl_store_item_sizes->_custom_query($mysql_query);
        return $query;
    }

}