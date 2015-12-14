<?php

class Store_items extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function delete_item($update_id)
    {

        $submit = $this->input->post('submit', TRUE);
        if ($submit=="No -Cancel") {
            redirect('store_items/create/' . $update_id);
        }

        if ($submit=="Yes -Delete Item") {
            //delete the item
            $this->_delete($update_id);
            //add flashdata
            $value = "<p style='color: green;'>The item was successfully deleted.</p>";
            $this->session->set_flashdata('item', $value);

            redirect('store_items/manage');
        }

        $data['update_id'] = $update_id;
        $templates = "admin";
        $current_url = current_url();
        $data['form_location'] = $current_url;
        $data['view_file'] = "delete_conf";
        $this->load->module('templates');
        $this->templates->$templates($data);
    }

    function _display_items_table()
    {
        $data['query'] = $this->get('item_name');
        $this->load->view('item_table', $data);
    }

    function get_data_from_post()
    {
        $data['item_name'] = $this->input->post('item_name', TRUE);
        $data['item_price'] = $this->input->post('item_price', TRUE);
        $data['item_description'] = $this->input->post('item_description', TRUE);
        return $data;
    }

    function get_data_from_db($update_id)
    {
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['item_name'] = $row->item_name;
            $data['item_price'] = $row->item_price;
            $data['small_pic'] = $row->small_pic;
            $data['big_pic'] = $row->big_pic;
            $data['item_description'] = $row->item_description;
            $data['item_url'] = $row->item_url;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function create()
    {
        $item_id = $this->uri->segment(3);
        $data = $this->get_data_from_post();
        $submit = $this->input->post('submit', TRUE);

        if ($item_id > 0) {
            if ($submit != "Submit") {
                //form has NOT been posted yet, so read from the database
                $data = $this->get_data_from_db($item_id);
            }
            $data['headline'] = "Edit Item";
        } else {
            $data['headline'] = "Create New Item";
        }

        $current_url = current_url();
        $data['form_location'] = str_replace('/create', '/submit', $current_url);

        $flash = $this->session->flashdata('item');
        if ($flash != "") {
            $data['flash'] = $flash;
        }

        $data['item_id'] = $item_id;
        $templates = "admin";
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->$templates($data);
    }

    function submit()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('item_price', 'Item Price', 'is_numeric|required');
        $this->form_validation->set_rules('item_description', 'Item Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $update_id = $this->uri->segment(3);

            if ($update_id > 0) {
                //this is an update!
                $data = $this->get_data_from_post();
                $data['item_url'] = url_title($data['item_name']);
                $this->_update($update_id, $data);
                $value = "<p style='color: green;'>The item was successfully updated.</p>";
            } else {
                //create a new record!
                $data = $this->get_data_from_post();
                $data['item_url'] = url_title($data['item_name']);
                $this->_insert($data);
                $value = "<p style='color: green;'>The item was successfully created.</p>";
                $update_id = $this->get_max();
            }
            //adding flashdata
            $this->session->set_flashdata('item', $value);
            redirect('store_items/create/' . $update_id);
        }
    }

    function manage()
    {
        $templates = "admin";

        $flash = $this->session->flashdata('item');
        if ($flash != "") {
            $data['flash'] = $flash;
        }

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->$templates($data);
    }

    function get($order_by)
    {
        $this->load->model('mdl_store_items');
        $query = $this->mdl_store_items->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $this->load->model('mdl_store_items');
        $query = $this->mdl_store_items->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $this->load->model('mdl_store_items');
        $query = $this->mdl_store_items->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $this->load->model('mdl_store_items');
        $query = $this->mdl_store_items->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_store_items');
        $this->mdl_store_items->_insert($data);
    }

    function _update($id, $data)
    {
        $this->load->model('mdl_store_items');
        $this->mdl_store_items->_update($id, $data);
    }

    function _delete($id)
    {
        $this->load->model('mdl_store_items');
        $this->mdl_store_items->_delete($id);
    }

    function count_where($column, $value)
    {
        $this->load->model('mdl_store_items');
        $count = $this->mdl_store_items->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $this->load->model('mdl_store_items');
        $max_id = $this->mdl_store_items->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $this->load->model('mdl_store_items');
        $query = $this->mdl_store_items->_custom_query($mysql_query);
        return $query;
    }

}