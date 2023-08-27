<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Boss extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('m_level') != 3) {
			redirect('user', 'refresh');
		}

		$this->load->model('Member_model');
		$this->load->model('Services_model');
		$this->load->model('Devices_model');
		
	}

	public function index()
	{
		// print_r($_SESSION);
		$m_id = $_SESSION['m_id'];
		$data['query']=$this->Services_model->list_lend_member_boss();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_boss');
		$this->load->view('boss/list_lend',$data);
		$this->load->view('template/backfooter_staff');
	}

	public function profile()
	{
		$m_id = $_SESSION['m_id'];
		// echo $m_id;
		// echo '<br>';
		// print_r($_SESSION);
		// exit;
		$data['rsedit']=$this->Member_model->read($m_id);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_boss');
		$this->load->view('boss/member_form_edit',$data);
		$this->load->view('template/backfooter_staff');
	}

	public function edit_profile()
	{
		$this->form_validation->set_rules('m_fname', 'm_fname', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_name', 'm_name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_lname', 'm_lname', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('m_email', 'm_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('m_phone', 'm_phone', 'trim|required|min_length[9]');


		if ($this->form_validation->run() == FALSE) {

			$m_id = $_SESSION['m_id'];
			// echo $m_id;
			// echo '<br>';
			// print_r($_SESSION);
			// exit;
			$data['rsedit']=$this->Member_model->read($m_id);
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// exit;
			$this->load->view('template/backheader_boss');
			$this->load->view('boss/member_form_edit',$data);
			$this->load->view('template/backfooter_staff');

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
					redirect('boss/profile','refresh');
				}
			}//ปิดถ้ามีการอัพโหลดภาพเข้ามาใหม่
			else{

				// echo 'ok';
				// exit;

				// echo 'ไม่มีการอัพโหลดภาพ';
				// exit;
				$this->Member_model->editstaff();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('boss/profile','refresh');


			}

			


		}
	}


	public function pwd()
	{
		$m_id = $_SESSION['m_id'];
		// echo $m_id;
		// echo '<br>';
		// print_r($_SESSION);
		// exit;
		$data['rsedit']=$this->Member_model->read($m_id);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_boss');
		$this->load->view('boss/member_form_pwd',$data);
		$this->load->view('template/backfooter_staff');
	}

	public function editpwd()
	{
  // 		echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$this->Member_model->editbosspwd();
		redirect('boss','refresh');
	}


	public function devices()
	{
		$data['query']=$this->Devices_model->list_devices();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_boss');
		$this->load->view('boss/devices_list',$data);
		$this->load->view('template/backfooter_staff');
	}



}