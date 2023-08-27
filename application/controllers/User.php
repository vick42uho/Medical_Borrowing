<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
		
	}

	public function index()
	{
		
		// print_r($_SESSION);
		// $this->load->view('template/backheader_login');
		$this->load->view('login_form');
		// $this->load->view('template/backfooter_login');
	}

	public function checklogin()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</prt>';
		$m_username=$this->input->post('m_username');
		$m_password=$this->input->post('m_password');


		// echo 'user = ' .$m_username;
		// echo '<br>';
		// echo 'pass = ' .$m_password;

		// exit;

		if($m_username=='admin' && $m_password=='admin'){
			//echo 'login successful';
			$this->session->set_userdata('level', 'admin');
			// print_r($_SESSION);
			redirect('admin', 'refresh');
		}else{
			echo 'username & password wrong!!';
		}
	}

	public function checklogin2()
	{
		if ($this->input->post('m_username')=='') {
			$this->load->view('user');
		}else{

			// echo '<pre>';
			// print_r($this->input->post());
			// echo '</pre>';
			//exit;
			$result = $this->Member_model->fetch_user_login(
				$this->input->post('m_username'),
				sha1($this->input->post('m_password'))
			);

			// print_r($result);

			//exit;


			if (!empty($result)) {
				$smb=array(
					'm_id'		=> $result->m_id,
					'm_level'	=> $result->ref_pid,
					'm_division'	=> $result->ref_did,
					'm_fname'	=> $result->m_fname,
					'm_name'	=> $result->m_name,
					'm_lname'	=> $result->m_lname,
					'm_img'		=> $result->m_img
				);

				// echo '<br>';
				// print_r($smb);

				//exit;
				$this->session->set_userdata($smb);

				// echo '<br>';
				// print_r($_SESSION);

				$m_level = $_SESSION['m_level'];

				//echo ' level '.$m_level;

				// echo '<hr>';

				if ($m_level==1) {
					//echo 'r u admin';
					redirect('admin','refresh');
				}elseif ($m_level==2) {
					// print_r($_SESSION);
					// echo 'r u staff';
					redirect('staff','refresh');
				}elseif ($m_level==3) {
					//echo 'r u boss';
					redirect('boss','refresh');
				}elseif ($m_level==4) {
					//echo 'r u employee';
					redirect('employee','refresh');
				}


			}else{
				$this->session->unset_userdata(array('m_id','m_level','m_fname','m_name','m_lname'));
				redirect('user');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata(array('m_id','m_level','m_fname','m_name','m_lname'));
		redirect('user', 'refresh');
	}



}