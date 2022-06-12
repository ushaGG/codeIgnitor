<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function create($formArray)
	{
		$this->db->insert('categories',$formArray);
        
	}


	public function getCatergories($params=[])
	{
		if(!empty($params['queryString'])){
			$this->db->like('name',$params['queryString']);

		}
		$result= $this->db->get('categories')->result_array();
		return $result;
        
	}

	public function getcategory($id){
		$this->db->where('id',$id);
		$category=$this->db->get('categories')->row_array();
		return $category;	

	}

	public function update($id,$formArray){
		$this->db->where('id',$id);
		$this->db->update('categories',$formArray);
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('categories');
	}
}
