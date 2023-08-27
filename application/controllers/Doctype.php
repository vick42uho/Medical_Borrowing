<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctype extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Doctype_model');
        if ($this->session->userdata('m_level') != 1) {
			redirect('user', 'refresh');
		}
		
	}

	public function index()
	{
        $data['query']=$this->Doctype_model->list_Doctype();
        // echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/doctype',$data);
		$this->load->view('template/backfooter');
	}
	public function adding()
	{
		$this->load->view('template/backheader');
		$this->load->view('admin/doctype_form_add');
		$this->load->view('template/backfooter');
	}

    public function adddata()
    {
        // echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
        $this->Doctype_model->adddoctype();
        redirect('doctype','refresh');
    }

    public function edit($did)
	{
		$data['rsedit']=$this->Doctype_model->read($did);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/doctype_form_edit',$data);
		$this->load->view('template/backfooter');
	}

	public function editdata()
    {
        // echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
        $this->Doctype_model->editDoctype();
        redirect('doctype','refresh');
    }

	public function del($did)
	{
		// print_r($_POST);

		$this->Doctype_model->deldata($did);
		redirect('doctype','refresh');
	}



}