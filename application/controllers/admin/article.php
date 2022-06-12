<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	//this method is to list
	public function index()
	{
		$this->load->model('Article_model');
		$queryString=$this->input->get('q');
		$params['queryString']=$queryString;
		$article=$this->Article_model->getCatergories($params);
		$data['categories']=$article;
		$data['queryString']=$queryString;

		$this->load->view('admin/article/list',$data);
	}



	//this method is for creating
	public function create(){

		//$this->load->library('commen_helper');
		$config['upload_path']          = './public/uploads/category/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         = true;
	

		$this->load->library('upload', $config);
	

		$this->load->model('article');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules('name','Name','trim|required');
		
		
		if($this->form_validation->run() == TRUE){
			$formArray['image'] =$this->input->post('image');
			if(($_FILES['image']['name'])){
				
				// if($this->upload->do_upload('image')){
				// // $data =  $this->upload->data();


				// // $formArray['name']=$this->input->post('name');
				// // $formArray['status']=$this->input->post('status');
				// // $formArray['created']=date('y-m-d H:i:s');
				// // $this->Category_model->create($formArray);
				// // $this->session->set_flashdata('success','Category add successfully');
				// // redirect(base_url().'index.php/admin/category/index');

				// }else{
				// 	$error =  $this->upload->display_errors();
				// 	$data['error_image']=$error;
				// 	$this->load->view('admin/category/create',$data);
				// }

			}else{
				$formArray['image'] =$this->input->post('image');
				$formArray['name']=$this->input->post('name');
				$formArray['status']=$this->input->post('status');
				$formArray['created']=date('y-m-d H:i:s');
				$this->Category_model->create($formArray);
				$this->session->set_flashdata('success','Category add successfully');
				redirect(base_url().'index.php/admin/article/index');
			}

		

		}else{

			$this->load->view('admin/category/create');
		}
		
	}



	//this method is for editing
	public function edit($id){

		$this->load->model('Category_model');
		$category=$this->Category_model->getcategory($id);
		
		if(empty($category)){
			$this->session->set_flashdata('error','Category not found');
			redirect(base_url().'index.php/admin/category/index');

		}

	
		$config['upload_path']          = './public/uploads/category/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         = true;
	

		$this->load->library('upload', $config);
	

		$this->load->model('Category_model');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules('name','Name','trim|required');
		
		
		if($this->form_validation->run() == TRUE){

			$formArray['image'] =$this->input->post('image');
			if(($_FILES['image']['name'])){
				
				// if($this->upload->do_upload('image')){
				// // $data =  $this->upload->data();


				// // $formArray['name']=$this->input->post('name');
				// // $formArray['status']=$this->input->post('status');
				// // $formArray['created']=date('y-m-d H:i:s');
				// // $this->Category_model->create($formArray);
				// // $this->session->set_flashdata('success','Category add successfully');
				// // redirect(base_url().'index.php/admin/category/index');

				// }else{
				// 	$error =  $this->upload->display_errors();
				// 	$data['error_image']=$error;
				// 	$this->load->view('admin/category/edit',$data);
				// }

			}else{
				$formArray['image'] =$this->input->post('image');
				$formArray['name']=$this->input->post('name');
				$formArray['status']=$this->input->post('status');
				$formArray['updated']=date('y-m-d H:i:s');
				$this->Category_model->update($id,$formArray);
				$this->session->set_flashdata('success','Category updated successfully');
				redirect(base_url().'index.php/admin/category/index');
			}



		}
		else{
			$data['category']=$category;
			$this->load->view('admin/category/edit',$data);
		}
	}

	//this method is for deleting
	public function delete($id){
		$this->load->model('Category_model');
		$category=$this->Category_model->getcategory($id);
		
		if(empty($category)){
			$this->session->set_flashdata('error','Category not found');
			redirect(base_url().'index.php/admin/category/index');

		}
		$this->Category_model->delete($id);
		$this->session->set_flashdata('success','Category deteled sucessfully');
		redirect(base_url().'index.php/admin/category/index');
	}
}
