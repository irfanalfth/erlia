<?php

class Data_user_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user by user_id
     */
    function get_data_user($user_id)
    {
        return $this->db->get_where('user', array('user_id' => $user_id))->row_array();
    }

    /*
     * Get all user
     */
    function get_all_data_user()
    {
        $this->db->order_by('user_id', 'desc');
        return $this->db->get('user')->result_array();
    }

    /*
     * function to add new user
     */
    function add_data_user($params)
    {
        $this->db->insert('user', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user
     */
    function update_data_user($user_id, $params)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update('user', $params);
    }

    /*
     * function to delete user
     */
    function delete_data_user($user_id)
    {
        return $this->db->delete('user', array('user_id' => $user_id));
    }

    function cekEmail($email)
    {
        return $this->db->get_where('user', array('email' => $email))->row_array();
    }
}
