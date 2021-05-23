<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_model
{
	function login($username,$password){
		return $this->db->get_where('user',array('email' =>$username, 'password' => $password))->row_array();
	}
}