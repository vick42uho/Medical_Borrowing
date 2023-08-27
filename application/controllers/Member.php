<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Position_model');
		$this->load->model('Division_model');
		if ($this->session->userdata('m_level') != 1) {
			redirect('user', 'refresh');
		}
		
	}

	public function index()
	{
		// print_r($_SESSION);
		$data['query']=$this->Member_model->list_member();
        // echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/member',$data);
		$this->load->view('template/backfooter');
	}
	public function adding()
	{
		$data['rspo']=$this->Position_model->list_position();
		$data['rsde']=$this->Division_model->list_division();
        // echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/member_form_add',$data);
		$this->load->view('template/backfooter');
	}


	public function adddata()
	{
        // echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->Member_model->addmember();
		redirect('member','refresh');
	}

// เพิ่ม function สำหรับเพิ่มข้อมูลซ้ำ
	public function adddata2()
	{
		$this->form_validation->set_rules('ref_pid', 'ref_pid', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('ref_did', 'ref_did', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('m_username', 'm_username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('m_password', 'm_password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('m_fname', 'm_fname', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_name', 'm_name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_lname', 'm_lname', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_email', 'm_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('m_phone', 'm_phone', 'trim|required|min_length[2]');

		if ($this->form_validation->run() == FALSE) {

			$data['rspo']=$this->Position_model->list_position();
			$data['rsde']=$this->Division_model->list_division();
		        // echo '<pre>';
				// print_r($data);
				// echo '</pre>';
				// exit;
			$this->load->view('template/backheader');
			$this->load->view('admin/member_form_add',$data);
			$this->load->view('template/backfooter');
		} else {

					//resize
			if (isset($_FILES['m_img']) && !empty($_FILES['m_img']['name'])) {
				$upload_path="profile_img/";
				$config['encrypt_name'] = TRUE;
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('m_img')) {
							//Image Resizing
					$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config1['new_image'] = 'profile_img/';
					$config1['maintain_ratio'] = TRUE;
					$config1['width'] = 200;
					$config1['height'] = 200;
					$this->load->library('image_lib', $config1);
					if ( ! $this->image_lib->resize()) {
						$this->session->set_flashdata('message', $this->image_lib->display_error('', ''));
					}

					

					//echo 'image name = '.$filename;

					//exit;



					$this->Member_model->addmember2();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('member','refresh');
				}
			}





		}


	}

	public function edit($m_id)
	{
		$data['rsedit']=$this->Member_model->read($m_id);
		$data['rspo']=$this->Position_model->list_position();
		$data['rsde']=$this->Division_model->list_division();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/member_form_edit',$data);
		$this->load->view('template/backfooter');
	}

	public function edit_img($m_id)
	{
		$data['rsedit']=$this->Member_model->read($m_id);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader');
		$this->load->view('admin/member_form_edit_img',$data);
		$this->load->view('template/backfooter');
	}

	public function editdata_img()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		// resize
		if (isset($_FILES['m_img']) && !empty($_FILES['m_img']['name'])) {
			$upload_path="profile_img/";
			$config['encrypt_name'] = TRUE;
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('m_img')) {
							//Image Resizing
				$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config1['new_image'] = 'profile_img/';
				$config1['maintain_ratio'] = TRUE;
				$config1['width'] = 200;
				$config1['height'] = 200;
				$this->load->library('image_lib', $config1);
				if ( ! $this->image_lib->resize()) {
					$this->session->set_flashdata('message', $this->image_lib->display_error('', ''));
				}

				// $filename = $this->upload->file_name;

				// 	echo $filename;
				// 	exit;

					//echo 'image name = '.$filename;

					//exit;



				$this->Member_model->editmember_img_onty();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('member','refresh');
			}
		}




	}



	public function pwd($m_id)
	{
		$data['rsedit']=$this->Member_model->read($m_id);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/member_form_pwd',$data);
		$this->load->view('template/backfooter');
	}






	public function editdata()
	{
  		//echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$this->form_validation->set_rules('ref_pid', 'ref_pid', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('ref_did', 'ref_did', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('m_fname', 'm_fname', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_name', 'm_name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_lname', 'm_lname', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_email', 'm_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('m_phone', 'm_phone', 'trim|required|min_length[9]');

		if ($this->form_validation->run() == FALSE) {

			$m_id = $this->input->post('m_id');
			$data['rsedit']=$this->Member_model->read($m_id);
			$data['rspo']=$this->Position_model->list_position();
			$data['rsde']=$this->Division_model->list_division();
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// exit;
			$this->load->view('template/backheader');
			$this->load->view('admin/member_form_edit',$data);
			$this->load->view('template/backfooter');

		} else {


			//resize ถ้ามีการอัพโหลดภาพใหม่
			if (isset($_FILES['m_img']) && !empty($_FILES['m_img']['name'])) {
				$upload_path="profile_img/";
				$config['encrypt_name'] = TRUE;
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('m_img')) {
							//Image Resizing
					$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config1['new_image'] = 'profile_img/';
					$config1['maintain_ratio'] = TRUE;
					$config1['width'] = 200;
					$config1['height'] = 200;
					$this->load->library('image_lib', $config1);
					if ( ! $this->image_lib->resize()) {
						$this->session->set_flashdata('message', $this->image_lib->display_error('', ''));
					}

					// $filename = $this->upload->file_name;

					// echo $filename;
					// exit;

					

					//echo 'image name = '.$filename;

					//exit;



					$this->Member_model->editmember_img();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('member','refresh');
				}
			}//ปิดถ้ามีการอัพโหลดภาพเข้ามาใหม่
			else{

				// echo 'ok';
				// exit;

				// echo 'ไม่มีการอัพโหลดภาพ';
				// exit;
				$this->Member_model->editmember();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('member','refresh');

			}

			


		}


		
	}      

	public function editpwd()
	{
  		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('m_id', 'm_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('m_password', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('m_password2', 'Password Confirmation', 'trim|required|matches[m_password]');
		


		if ($this->form_validation->run() == FALSE) {

			$m_id = $this->input->post('m_id');
			$data['rsedit']=$this->Member_model->read($m_id);
			$this->load->view('template/backheader');
			$this->load->view('admin/member_form_pwd',$data);
			$this->load->view('template/backfooter');
		}else{

			$this->Member_model->editmemberpwd();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('member','refresh');
		}


	}


	public function del($m_id)
	{
		// print_r($_POST);

		$this->Member_model->deldata($m_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('member','refresh');
	}



}