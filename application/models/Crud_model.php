<?php

class Crud_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }

    public function add($table, $data, $returnId = false)
    {
        try
        {
            $this->db->insert($table, $data);
            if ($this->db->affected_rows() == '1')
            {
                if($returnId == TRUE){
                    return $this->db->insert_id($table);
                }
                return TRUE;
            }
            return FALSE;

        }catch(\Exception $e){
            return FALSE;
        }
              
    }
    

    public function update($table, $data, $field_1, $field_2)
    {
        try
        {
            $this->db->where($field_1, $field_2);
            $this->db->update($table, $data);
            if ($this->db->affected_rows() > 0)
                return TRUE;

            return FALSE;

        }catch(\Exception $e){
            return FALSE;
        }     
    }
    
    
    public function delete($table, $field_1, $field_2)
    {
        try
        {
            $this->db->where($field_1,$field_2);
            $this->db->delete($table);
            if ($this->db->affected_rows() == '1')
            {
                return TRUE;
            }

            return FALSE;

        }catch(\Exception $e){
            return FALSE;
        }        
    }

    public function get($table, $limit = NULL, $start = NULL)
    {
        try
        {
            $this->db->select('*');
            if($limit != NULL || $start != NULL)
                $this->db->limit($limit, $start);
            return $this->db->get($table)->result();

        }catch(\Exception $e){
            return FALSE;
        }
    }

    public function countAll($table)
    {
        try
        {
            $this->db->select('COUNT(id) AS result');
            return $this->db->get($table)->row();

        }catch(\Exception $e){
            return FALSE;
        }
    }

    public function list($table, $field_1, $field_2)
    {
        try
        {
            $this->db->select('*');
            $this->db->where($field_1, $field_2);
            return $this->db->get($table)->row();

        }catch(\Exception $e){
            return FALSE;
        }
    }
}
