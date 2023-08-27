<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('m_level') != 1) {
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
		$data['query']=$this->Services_model->list_lend_member_boss($m_id);
		$this->load->view('template/backheader');
		$this->load->view('admin/list_lend',$data);
		$this->load->view('template/backfooter');
	}


	public function devices()
	{
		$data['query']=$this->Devices_model->list_devices();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader');
		$this->load->view('admin/devices_list',$data);
		$this->load->view('template/backfooter');
	}


}