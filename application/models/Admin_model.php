<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getByUsername($username)
	{
		$this->db->where('user_name',$username);
        $user=$this->db->get('user')->row_array();//select * from user where user_name=[]
        return $user;
	}
}
