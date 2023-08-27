<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Boss extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('m_level') != 2) {
			redirect('user', 'refresh');
		}
		$this->load->model('Doc_model');
		$this->load->model('Doctype_model');
		$this->load->model('Member_model');

		
	}

	public function index()
	{
		// print_r($_SESSION);
		$data['query']=$this->Doc_model->list_doc();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_boss');
		$this->load->view('boss/list_doc',$data);
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

	public function editdata()
    {
  		//echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
        $this->Member_model->editboss();
        redirect('boss/profile','refresh');
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


    



}