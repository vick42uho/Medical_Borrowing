<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('m_level') != 2) {
			redirect('user', 'refresh');
		}
		$this->load->model('Member_model');
		$this->load->model('Division_model');
		$this->load->model('Type_model');
		$this->load->model('Devices_model');
		$this->load->model('Status_model');
		$this->load->model('Services_model');
		
	}

	public function index()
	{
		// print_r($_SESSION);
		$data['query']=$this->Services_model->list_lend();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/list_lend',$data);
		$this->load->view('template/backfooter_staff');
	}



	public function lend_list()
	{
		// print_r($_SESSION);
		$data['query']=$this->Services_model->lend_list();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/lend_list',$data);
		$this->load->view('template/backfooter_staff');
	}


	public function return_list()
	{
		// print_r($_SESSION);
		$data['query']=$this->Services_model->return_list();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/list_return',$data);
		$this->load->view('template/backfooter_staff');
	}




	
	public function damaged_list()
	{
		// print_r($_SESSION);
		$data['query']=$this->Services_model->list_damaged();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/list_damaged',$data);
		$this->load->view('template/backfooter_staff');
	}


	public function repair_list()
	{
		// print_r($_SESSION);
		$data['query']=$this->Services_model->list_repair();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/list_repair',$data);
		$this->load->view('template/backfooter_staff');
	}



	public function add_lend1()
	{

		$data['query']=$this->Member_model->list_memberUI1();
		$data['ld']=$this->Devices_model->list_devices_free();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/form_add_lend1',$data);
		$this->load->view('template/backfooter_staff');
	}


	public function add_lend1_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('ref_m_id', 'รหัสสมาชิก', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('device', 'รหัสทะเบียนอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_id_lend', 'รหัสเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_name_lend', 'ชื่อเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_reason', 'เหตุผลการยืม', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$data['query']=$this->Member_model->list_memberUI1();
			$data['ld']=$this->Devices_model->list_devices_free();

			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend1',$data);
			$this->load->view('template/backfooter_staff');

		}else{


			$this->Services_model->add_lend1_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}
	}


	public function add_lend2()
	{

		$data['query']=$this->Member_model->list_memberUI1();
		$data['ld']=$this->Devices_model->list_devices_free();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/form_add_lend2',$data);
		$this->load->view('template/backfooter_staff');

	}

	public function add_lend2_db()
	{
		$this->form_validation->set_rules('ref_m_id', 'รหัสสมาชิก', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('device', 'รหัสทะเบียนอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_id_lend', 'รหัสเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_name_lend', 'ชื่อเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_reason', 'เหตุผลการยืม', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$data['query']=$this->Member_model->list_memberUI1();
			$data['ld']=$this->Devices_model->list_devices_free();

			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend2',$data);
			$this->load->view('template/backfooter_staff');

		}else{


			$this->Services_model->add_lend1_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}
	}


	public function add_lend3()
	{
		$s=$this->input->post('s');
		if ($s=='q') {
			//print_r($_POST);

			$m_id=$this->input->post('m_id');
			$data['query']=$this->Member_model->read($m_id);

			// echo '<pre>';
			// print_r($data['query']);
			// echo '</pre>';

			$data['ld']=$this->Devices_model->list_devices_free();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend3',$data);
			$this->load->view('template/backfooter_staff');

		}else{

		// $data['query']=$this->Member_model->list_memberUI1();
			$data['ld']=$this->Devices_model->list_devices_free();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend3',$data);
			$this->load->view('template/backfooter_staff');
		}
	}


	public function add_lend3_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('ref_m_id', 'รหัสสมาชิก', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('device', 'รหัสทะเบียนอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_id_lend', 'รหัสเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_name_lend', 'ชื่อเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_reason', 'เหตุผลการยืม', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$m_id=$this->input->post('ref_m_id');
			$data['query']=$this->Member_model->read($m_id);
			$data['ld']=$this->Devices_model->list_devices_free();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend3',$data);
			$this->load->view('template/backfooter_staff');

		}else{


			$this->Services_model->add_lend1_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}
	}


	public function add_lend4()
	{
		$s=$this->input->post('s');
		if ($s=='q') {
			//print_r($_POST);

			$m_id=$this->input->post('m_id');
			$data['query']=$this->Member_model->read($m_id);

			// echo '<pre>';
			// print_r($data['query']);
			// echo '</pre>';

			$data['ld']=$this->Devices_model->list_devices_free();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend4',$data);
			$this->load->view('template/backfooter_staff');

		}else{

		// $data['query']=$this->Member_model->list_memberUI1();
			$data['ld']=$this->Devices_model->list_devices_free();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend4',$data);
			$this->load->view('template/backfooter_staff');
		}
	}


	public function add_lend5()
	{
		$data['query']=$this->Member_model->list_memberUI1();
		$data['ld']=$this->Devices_model->list_devices_free();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/form_add_lend5',$data);
		$this->load->view('template/backfooter_staff');
	}





	public function edit_lend($mbr_id)
	{
		$data['rsedit']=$this->Services_model->query_edit_lend($mbr_id);
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/form_edit_lend',$data);
		$this->load->view('template/backfooter_staff');
	}


	public function edit_lend_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();
		$this->form_validation->set_rules('mbr_id', 'mbr_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_reason', 'เหตุผลการยืม', 'trim|required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {

			$mbr_id = $this->input->post('mbr_id');
			$data['rsedit']=$this->Services_model->query_edit_lend($mbr_id);

			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_edit_lend', $data);
			$this->load->view('template/backfooter_staff');

		}else{

			// echo 'ok';
			// exit;
			$this->Services_model->edit_lend_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}
	}


	public function return_lend($mbr_id)
	{
		$data['rsedit']=$this->Services_model->query_edit_lend($mbr_id);
		$data['querystatus']=$this->Status_model->list_status_return();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit();
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/form_return_lend',$data);
		$this->load->view('template/backfooter_staff');
	}

	public function return_lend_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();


		$this->form_validation->set_rules('mbr_id', 'รหัสยืม-คืน', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('d_id', 'รหัส/เลขอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('ref_s_id', 'รหัสสถานะ', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_id_return', 'รหัสผู้บันทึกคืน', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_name_return', 'ชื่อผู้บันทึกการคืน', 'trim|required|min_length[1]');



		if ($this->form_validation->run() == FALSE) {

			$mbr_id = $this->input->post('mbr_id');
			$data['rsedit']=$this->Services_model->query_edit_lend($mbr_id);
			$data['querystatus']=$this->Status_model->list_status_return();
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// exit();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_return_lend',$data);
			$this->load->view('template/backfooter_staff');
			
		}else{
			// echo 'ok';
			// exit;


			$this->Services_model->return_lend_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}

	}













	public function add_lend4_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('ref_m_id', 'รหัสสมาชิก', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('device[]', 'รหัสทะเบียนอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_id_lend', 'รหัสเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_name_lend', 'ชื่อเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_reason', 'เหตุผลการยืม', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$m_id=$this->input->post('ref_m_id');
			$data['query']=$this->Member_model->read($m_id);
			$data['ld']=$this->Devices_model->list_devices_free();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend4',$data);
			$this->load->view('template/backfooter_staff');

		}else{


			$this->Services_model->add_lend4_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}
	}



	public function add_lend5_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('ref_m_id', 'รหัสสมาชิก', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('device[]', 'รหัสทะเบียนอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_id_lend', 'รหัสเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_staff_name_lend', 'ชื่อเจ้าหน้าที่ดูแลอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('mbr_reason', 'เหตุผลการยืม', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$m_id=$this->input->post('ref_m_id');
			$data['query']=$this->Member_model->read($m_id);
			$data['ld']=$this->Devices_model->list_devices_free();
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/form_add_lend5',$data);
			$this->load->view('template/backfooter_staff');

		}else{


			$this->Services_model->add_lend4_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}





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
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/member_form_edit',$data);
		$this->load->view('template/backfooter_staff');
	}


	public function editdata()
	{
  		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;


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
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/member_form_edit',$data);
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
					redirect('staff/profile','refresh');
				}
			}//ปิดถ้ามีการอัพโหลดภาพเข้ามาใหม่
			else{

				// echo 'ok';
				// exit;

				// echo 'ไม่มีการอัพโหลดภาพ';
				// exit;
				$this->Member_model->editstaff();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('staff/profile','refresh');


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
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/member_form_pwd',$data);
		$this->load->view('template/backfooter_staff');
	}

	public function editpwd()
	{
  // 		echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$this->form_validation->set_rules('m_password', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('m_password2', 'Password Confirmation', 'trim|required|matches[m_password]');


		if ($this->form_validation->run() == FALSE) {

			$m_id = $_SESSION['m_id'];

			$data['rsedit']=$this->Member_model->read($m_id);
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/member_form_pwd',$data);
			$this->load->view('template/backfooter_staff');

		}else{

			$this->Member_model->editstaffpwd();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff','refresh');
		}

	}







	public function type()
	{
		$data['query']=$this->Type_model->list_type();
    	// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/type_list',$data);
		$this->load->view('template/backfooter');
	}


	public function add_type()
	{

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/type_form_add');
		$this->load->view('template/backfooter');
	}

	public function addtype_db()
	{
  		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('t_name', 'ชื่อประเภทอุปกรณ์', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$this->load->view('template/backheader_staff');
			$this->load->view('staff/type_form_add');
			$this->load->view('template/backfooter');

		}else{

			$this->Type_model->addtype_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff/type','refresh');
		}
	}


	public function edit_type($t_id)
	{

		$data['query']=$this->Type_model->read($t_id);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/type_form_edit',$data);
		$this->load->view('template/backfooter');
	}



	public function edittype_db()
	{
  		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('t_name', 'ชื่อประเภทอุปกรณ์', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$t_id = $this->input->post('t_id');
			$data['query']=$this->Type_model->read($t_id);
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/type_form_edit',$data);
			$this->load->view('template/backfooter');

		}else{

			$this->Type_model->edittype_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff/type','refresh');
		}
	}


	public function del_type($t_id)
	{
		$this->Type_model->deltype_db($t_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('staff/type','refresh');
	}




	public function devices()
	{
		$data['query']=$this->Devices_model->list_devices();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/devices_list',$data);
		$this->load->view('template/backfooter');
	}


	public function add_devices()
	{
		$data['query']=$this->Type_model->list_type();
		$data['querystatus']=$this->Status_model->list_status();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/devices_form_add',$data);
		$this->load->view('template/backfooter');
	}



	public function add_devices_db()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$this->form_validation->set_rules('ref_t_id', 'รหัสประเภทอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('ref_s_id', 'รหัสสถานะ', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('d_id', 'เลขอุปกรณ์', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('d_name', 'ชื่ออุปกรณ์', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('d_detail', 'รายละเอียดอุปกรณ์', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('ref_m_id', 'รหัสผู้เพิ่มข้อมูล', 'trim|required|min_length[1]');

		if ($this->form_validation->run() == FALSE) {

			$data['query']=$this->Type_model->list_type();
			$data['querystatus']=$this->Status_model->list_status();

			$this->load->view('template/backheader_staff');
			$this->load->view('staff/devices_form_add',$data);
			$this->load->view('template/backfooter');

		}else{

			//resize
			if (isset($_FILES['d_img']) && !empty($_FILES['d_img']['name'])) {
				$upload_path="devices_img/";
				$config['encrypt_name'] = TRUE;
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('d_img')) {
							//Image Resizing
					$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config1['new_image'] = 'devices_img/';
					$config1['maintain_ratio'] = TRUE;
					$config1['width'] = 300;
					$config1['height'] = 300;
					$this->load->library('image_lib', $config1);
					if ( ! $this->image_lib->resize()) {
						$this->session->set_flashdata('message', $this->image_lib->display_error('', ''));
					}

					

					//echo 'image name = '.$filename;

					//exit;



					$this->Devices_model->add_devices_db();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('staff/devices','refresh');
				}
			}
		}

	}



	public function edit_devices($no)
	{
		$data['query']=$this->Type_model->list_type();
		$data['querystatus']=$this->Status_model->list_status();
		$data['rsedit']=$this->Devices_model->read($no);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/devices_form_edit',$data);
		$this->load->view('template/backfooter');
	}




	public function edit_devices_db()
	{
		$this->form_validation->set_rules('ref_t_id', 'รหัสประเภทอุปกรณ์', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('ref_s_id', 'รหัสสถานะ', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('d_id', 'เลขอุปกรณ์', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('d_name', 'ชื่ออุปกรณ์', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('d_detail', 'รายละเอียดอุปกรณ์', 'trim|required|min_length[4]');


		if ($this->form_validation->run() == FALSE) {

			$no = $this->input->post('no');
			$data['query']=$this->Type_model->list_type();
			$data['querystatus']=$this->Status_model->list_status();
			$data['rsedit']=$this->Devices_model->read($no);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/devices_form_edit',$data);
			$this->load->view('template/backfooter');
		}else{

						//resize ถ้ามีการอัพโหลดภาพใหม่
			if (isset($_FILES['d_img']) && !empty($_FILES['d_img']['name'])) {
				$upload_path="devices_img/";
				$config['encrypt_name'] = TRUE;
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('d_img')) {
							//Image Resizing
					$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config1['new_image'] = 'devices_img/';
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



					$this->Devices_model->edit_devices_db_img();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('staff/devices','refresh');
				}

			}else{
				$this->Devices_model->edit_devices_db();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('staff/devices','refresh');
			}

		}

	}

	public function edit_devices_img($no)
	{
		$data['rsedit']=$this->Devices_model->read($no);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/devices_form_edit_img',$data);
		$this->load->view('template/backfooter');
	}



	public function edit_devices_img_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		// resize
		if (isset($_FILES['d_img']) && !empty($_FILES['d_img']['name'])) {
			$upload_path="devices_img/";
			$config['encrypt_name'] = TRUE;
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('d_img')) {
							//Image Resizing
				$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config1['new_image'] = 'devices_img/';
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



				$this->Devices_model->editdevices_img_onty();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('staff/devices','refresh');
			}
		}




	}


	public function del_devices($no)
	{
		// print_r($_POST);

		$this->Devices_model->del_devices_db($no);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('staff/devices','refresh');
	}



	public function status()
	{
		$data['querystatus']=$this->Status_model->list_status();
    	// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/status_list',$data);
		$this->load->view('template/backfooter');
	}



	public function add_status()
	{

		$this->load->view('template/backheader_staff');
		$this->load->view('staff/status_form_add');
		$this->load->view('template/backfooter');
	}

	public function addstatus_db()
	{
  		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('s_name', 'ชื่อสถานะ', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$this->load->view('template/backheader_staff');
			$this->load->view('staff/status_form_add');
			$this->load->view('template/backfooter');

		}else{

			$this->Status_model->addstatus_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff/status','refresh');
		}
	}


	public function edit_status($s_id)
	{

		$data['rsedit']=$this->Status_model->read($s_id);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader_staff');
		$this->load->view('staff/status_form_edit',$data);
		$this->load->view('template/backfooter');
	}



	public function editstatus_db()
	{
  		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('s_name', 'ชื่อสถานะ', 'trim|required|min_length[3]');



		if ($this->form_validation->run() == FALSE) {

			$s_id = $this->input->post('s_id');
			$data['rsedit']=$this->Status_model->read($s_id);
			$this->load->view('template/backheader_staff');
			$this->load->view('staff/status_form_edit',$data);
			$this->load->view('template/backfooter');

		}else{

			$this->Status_model->editstatus_db();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('staff/status','refresh');
		}
	}


	public function del_status($s_id)
	{
		$this->Status_model->delstatus_db($s_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('staff/status','refresh');
	}




}