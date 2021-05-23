<?php

class Global_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user by user_id
     */
    function get_data($where = [], $table, $tipeResultArray = true, $order_by = null, $or = 'DESC')
    {
        if ($tipeResultArray == true) {
            if ($order_by == null) {
                return $this->db->get_where($table, $where)->result_array();
            } else {
                return $this->db->order_by($order_by, $or)->get_where($table, $where)->result_array();
            }
        } else {
            return $this->db->get_where($table, $where)->row_array();
        }
    }

    function insert($params, $table)
    {
        return $this->db->insert($table, $params);
    }

    function update($params, $table, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $params);
    }

    function delete($table, $where)
    {
        return $this->db->delete($table,$where);
    }
}
