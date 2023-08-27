<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Division extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Division_model');
		
	}

	public function index()
	{
		$data['query']=$this->Division_model->list_Division();
        // echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/division',$data);
		$this->load->view('template/backfooter');
	}


	public function adding()
	{
		$this->load->view('template/backheader');
		$this->load->view('admin/division_form_add');
		$this->load->view('template/backfooter');
	}
	

	public function adddata()
	{
		$this->form_validation->set_rules('dname', 'division Name', 'trim|required|min_length[4]');

		if ($this->form_validation->run() == FALSE) {

				$this->load->view('template/backheader');
				$this->load->view('admin/division_form_add');
				$this->load->view('template/backfooter');
		} else {
				$this->Division_model->addDivision();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('division', 'refresh');

				//set_flashdata ชั่วคราวมีอายุ 1 refresh
		}

        // echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

	}

	public function edit($did)
	{
		$data['rsedit']=$this->Division_model->read($did);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/division_form_edit',$data);
		$this->load->view('template/backfooter');
	}

	public function editdata()
	{
		$this->form_validation->set_rules('dname', 'ตำแหน่ง', 'trim|required|min_length[4]');
		
		$did=$this->input->post('did');
		if ($this->form_validation->run() == FALSE) {

			$data['rsedit']=$this->Division_model->read($did);
			$this->load->view('template/backheader');
			$this->load->view('admin/division_form_edit_error',$data);
			$this->load->view('template/backfooter');
				
		} else {

				$this->Division_model->editdivision();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('division', 'refresh');
		}
        // echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		
	}

	public function del($did)
	{
		// print_r($_POST);

		$this->Division_model->deldata($did);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('division','refresh');
	}



}