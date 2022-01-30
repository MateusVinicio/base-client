<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Datatable_lib
{
    public function __construct()
    {
        $this->CI = &Get_instance();
        $this->CI->load->model('crud_model', 'crud');
    }

    public function datatable($table)
    {
        $limit = $this->CI->input->post('length');
        $start =  $this->CI->input->post('start');

        $data = $this->CI->crud->get($table, $limit, $start);
        $countData = $this->CI->crud->countAll($table);

        $output = array(
            "recordsTotal" => $countData->result,
            "recordsFiltered" => $countData->result,
            "data" => $data,
        );

        return $output;
    }

}